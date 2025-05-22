FROM php:8.4-fpm-alpine

WORKDIR /code
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer