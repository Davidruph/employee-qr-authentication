# Stage 1: Build PHP dependencies
FROM composer:2.6 AS vendor

WORKDIR /app

# Copy only composer files
COPY composer.json composer.lock ./

# Install PHP dependencies (no dev, optimized autoloader)
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist


# Stage 2: Build frontend assets
FROM node:20 AS frontend

WORKDIR /app

# Copy only package files
COPY package.json package-lock.json ./

# Install dependencies and build assets
RUN npm install && npm run build


# Stage 3: Final Laravel image with Apache
FROM php:8.2-apache

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Enable Apache rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy Composer deps from vendor stage
COPY --from=vendor /app/vendor ./vendor

# Copy frontend assets from frontend stage
COPY --from=frontend /app/public/build ./public/build

# Copy rest of the app
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 80

CMD ["apache2-foreground"]
