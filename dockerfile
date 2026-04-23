# PHP 8.5 (Laravel 13 uchun mos) o'rnatilgan rasmiy tasvir
FROM php:8.5-fpm

# Kerakli tizim paketlarini o'rnatish
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    nginx

# PHP extensionlarini o'rnatish
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer-ni yuklab olish
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ishchi katalogni belgilash
WORKDIR /var/www

# Loyiha fayllarini ko'chirish
COPY . .

# Bog'liqliklarni o'rnatish
RUN composer install --no-dev --optimize-autoloader

# Laravel uchun papka ruxsatlarini berish
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Portni ochish
EXPOSE 80

# Laravelni ishga tushirish buyrug'i
# Eski CMD o'rniga shuni yozing:
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80