#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel application"
echo "========================================"

echo "Clearing configuration cache..."

php artisan config:clear

echo "Clearing route cache..."

php artisan route:clear

echo "Clearing view cache..."

php artisan view:clear

echo "Running database migrations..."

php artisan migrate --force

echo "Creating storage link..."

php artisan storage:link || true

echo "Caching Laravel configuration..."

php artisan config:cache

echo "Caching Laravel routes..."

php artisan route:cache

echo "Caching Laravel views..."

php artisan view:cache

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

exec nginx -g "daemon off;"