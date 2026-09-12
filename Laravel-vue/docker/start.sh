#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel application"
echo "========================================"

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

echo "Starting Laravel server..."

exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}