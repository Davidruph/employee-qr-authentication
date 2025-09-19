FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# ✅ Copy only composer files first (for caching)
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# ✅ Now copy the rest of the app
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

CMD ["apache2-foreground"]
