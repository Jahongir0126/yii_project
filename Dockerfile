# Используем базовый образ PHP 8.2 CLI
FROM php:8.2-cli

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы проекта
COPY . /var/www/html

# Устанавливаем зависимости проекта с помощью Composer
RUN composer install

# Устанавливаем переменные окружения
ENV DB_DSN=${DB_DSN}
ENV DB_USER=${DB_USER}
ENV DB_PASS=${DB_PASS}

# Запускаем встроенный PHP сервер
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
