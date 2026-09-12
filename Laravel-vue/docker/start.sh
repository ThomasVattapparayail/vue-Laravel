#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel application"
echo "========================================"

echo "Clearing Laravel caches..."

php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "Creating storage link..."

php artisan storage:link || true

echo "Running database migrations..."

php artisan migrate --force

echo "Caching Laravel configuration..."

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

exec nginx -g "daemon off;"