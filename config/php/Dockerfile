FROM php:8.3-fpm-alpine3.18
# install the PHP extensions we need
RUN apk update
RUN apk add --no-cache --virtual coreutils \
    freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev autoconf \
    icu-dev make zlib-dev g++ git zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include \
    && docker-php-ext-install gd intl opcache pdo pdo_mysql zip

# Add xdebug
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN apk add --update linux-headers
RUN pecl install xdebug-3.3.2
RUN docker-php-ext-enable xdebug
RUN apk del -f .build-deps

RUN { \
		echo 'zend_extension=xdebug'; \
		echo 'xdebug.idekey=docker'; \
		echo 'xdebug.mode=develop,coverage,debug,profile'; \
		echo 'xdebug.start_with_request=yes'; \
		echo 'xdebug.client_port=9003'; \
		echo 'xdebug.log=/dev/stdout'; \
		echo 'xdebug.log_level=0'; \
	} > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=0'; \
		echo 'opcache.validate_timestamps=1'; \
		echo 'opcache.fast_shutdown=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini
# Get Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN echo 'alias composer="XDEBUG_MODE=off composer"' >> ~/.bashrc
RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Install NODE & NPM
RUN apk add --update nodejs npm

WORKDIR /var/www/