FROM php:7.3-cli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
        git \
	&& docker-php-ext-configure zip --with-libzip \
	&& docker-php-ext-install zip