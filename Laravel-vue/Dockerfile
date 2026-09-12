# =========================================================
# Stage 1: Build Vue/Vite frontend
# =========================================================

FROM node:20-bookworm AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm ci

COPY . .

RUN npm run build


# =========================================================
# Stage 2: Laravel + PHP-FPM + Nginx
# =========================================================

FROM php:8.2-fpm-bookworm

WORKDIR /var/www

ENV APP_ENV=production
ENV PORT=10000

# ---------------------------------------------------------
# Install system packages
# ---------------------------------------------------------

RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# ---------------------------------------------------------
# Configure PHP extensions
# ---------------------------------------------------------

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# ---------------------------------------------------------
# Install Composer
# ---------------------------------------------------------

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ---------------------------------------------------------
# Copy Laravel application
# ---------------------------------------------------------

COPY . /var/www

# ---------------------------------------------------------
# Install Laravel dependencies
# ---------------------------------------------------------

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# ---------------------------------------------------------
# Copy Vue production build
# ---------------------------------------------------------

COPY --from=frontend /app/public/build /var/www/public/build

# ---------------------------------------------------------
# Laravel permissions
# ---------------------------------------------------------

RUN mkdir -p \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views \
    /var/www/storage/logs \
    /var/www/bootstrap/cache

RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

# ---------------------------------------------------------
# Nginx configuration
# ---------------------------------------------------------

COPY docker/nginx.conf /etc/nginx/sites-available/default

# Remove default nginx config if necessary
RUN rm -f /etc/nginx/sites-enabled/default \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# ---------------------------------------------------------
# Start script
# ---------------------------------------------------------

COPY docker/start.sh /start.sh

RUN chmod +x /start.sh

# ---------------------------------------------------------
# Render uses PORT=10000
# ---------------------------------------------------------

EXPOSE 10000

CMD ["/start.sh"]