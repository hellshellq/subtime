# Используем официальный образ PHP с FPM
FROM php:8.2-fpm-alpine

# Устанавливаем системные зависимости
RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    git \
    mysql-client \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd opcache \
    && docker-php-ext-enable opcache

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы проекта
COPY . .

# Выполняем Composer и NPM (это BUILD-фаза внутри Docker)
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Настраиваем права доступа (важно для Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Копируем конфигурацию Nginx
COPY ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./.docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Копируем конфигурацию PHP-FPM
COPY ./.docker/php-fpm/www.conf /etc/php82/php-fpm.d/www.conf

# Открываем порт для Nginx
EXPOSE 80

# Запускаем PHP-FPM и Nginx
CMD php-fpm -D && nginx -g "daemon off;" 