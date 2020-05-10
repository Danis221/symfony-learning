FROM php:7.4.5-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git-core \
    unzip \
    libssl-dev \
    libicu-dev \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) zip opcache intl pdo pdo_pgsql gd soap sockets pcntl bcmath \
    && pecl update-channels \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

## Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug && docker-php-ext-enable xdebug && rm -rf /tmp/* /var/tmp/*

RUN useradd --create-home --uid 1000 --user-group --system app

## Install application:
WORKDIR /opt/app

USER app

