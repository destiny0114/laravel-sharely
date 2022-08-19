FROM php:8.0-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && apt-get install -y \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libssl-dev \
    libzip-dev \
    unzip \
    zip \
    curl \
    vim \
    nodejs \
    yarn \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
        exif \
        opcache \
        pdo \
        pdo_mysql \
        pcntl \
        zip

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

COPY composer.lock composer.json /var/www/

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

RUN chown -R www:www .

USER www

EXPOSE 9000
CMD [ "php-fpm" ]
