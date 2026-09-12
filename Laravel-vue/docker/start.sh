#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel application"
echo "========================================"

php artisan migrate --force
php artisan db:seed --force

php artisan storage:link || true

php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Starting Laravel server..."

exec php artisan serve \
    --host=0.0.0.0 \
    --port=${PORT:-10000}