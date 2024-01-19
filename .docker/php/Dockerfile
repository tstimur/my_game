FROM php:8.2-fpm

RUN apt-get update && apt-get install -y libpq-dev \
    libfreetype6-dev \
                                                                libjpeg62-turbo-dev \
                                                                libmcrypt-dev \
                                                                libpng-dev \
                                                                libicu-dev \
                                                                libpq-dev \
                                                                libxpm-dev \
                                                                libvpx-dev \
                                                                libzip-dev \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer