#!/bin/bash
echo "Running the migrations..."
php artisan migrate --force

echo "Generating Laravel key..."
php artisan key:generate --force

echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo "Caching configurations and routes..."
php artisan config:cache
php artisan route:cache

echo "Checking permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting PHP-FPM..."
php-fpm -D

echo "Starting Nginx..."
nginx -g "daemon off;"
