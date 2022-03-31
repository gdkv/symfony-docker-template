FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone
RUN printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini

RUN curl -sS https://get.symfony.com/cli/installer | bash

RUN echo 'alias composer="XDEBUG_MODE=off composer"' >> ~/.bashrc

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/app