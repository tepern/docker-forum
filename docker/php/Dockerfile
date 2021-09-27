FROM composer:1.10 AS composer
FROM php:7.3-fpm

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

EXPOSE 9000
EXPOSE 8000

COPY --from=composer /usr/bin/composer /usr/bin/composer
