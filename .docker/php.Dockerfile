FROM php:8.4-fpm-alpine

RUN apk add icu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

WORKDIR /code
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer