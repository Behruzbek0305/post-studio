FROM php:8.5-fpm

# Kerakli tizim paketlari (libpq-dev qo'shildi)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    nginx

# PHP extensionlari (pdo_pgsql qo'shildi)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

# Migratsiya va serverni ishga tushirish
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80