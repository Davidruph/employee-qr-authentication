#!/usr/bin/env bash
set -e  # exit if anything fails

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Fixing permissions..."
chmod -R 775 storage bootstrap/cache

echo "Caching config..."
php artisan config:clear
php artisan config:cache

echo "Caching routes..."
php artisan route:clear
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force || echo "⚠️ Migration failed, continuing without stopping"
