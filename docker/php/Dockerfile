FROM composer:latest AS composer
FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

EXPOSE 9000
EXPOSE 8000

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer --version && php --v
