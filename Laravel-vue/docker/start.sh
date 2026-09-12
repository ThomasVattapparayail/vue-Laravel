#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel application"
echo "========================================"

echo "Preparing Laravel..."

php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Running database migrations..."

php artisan migrate --force

echo "Creating storage link..."

php artisan storage:link || true

echo "Clearing application cache..."

php artisan cache:clear

echo "Caching Laravel configuration..."

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

exec nginx -g "daemon off;"