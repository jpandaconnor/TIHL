FROM php:7.3-fpm-alpine

RUN apk add --update \
    && docker-php-ext-install mysqli pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/bin --filename=composer

WORKDIR /app

COPY composer.json /app
COPY composer.lock /app

RUN composer install

EXPOSE 80

CMD php -S 0.0.0.0:80 -t public