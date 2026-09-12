#!/bin/sh

set -e

echo "========================================"
echo "Starting Laravel + Vue"
echo "========================================"

echo "Running database migrations..."

php artisan migrate --force

echo "Creating storage link..."

php artisan storage:link || true

echo "Building Vue/Vite..."

npm run build

echo "Starting Laravel server..."

exec php artisan serve \
    --host=0.0.0.0 \
    --port=${PORT:-10000}