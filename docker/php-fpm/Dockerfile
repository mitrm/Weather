ARG PHP_BASE_IMAGE_VERSION
FROM php:8.0.6-fpm-buster

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && \
    apt-get -y install \
        gnupg2 && \
    apt-key update && \
    apt-get update && \
    apt-get -y install \
            g++ \
            git \
            curl \
            wget \
            imagemagick \
            libfreetype6-dev \
            libcurl3-dev \
            libicu-dev \
            libmcrypt-dev \
            libfreetype6-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libmagickwand-dev \
            libpq-dev \
            libpng-dev \
            zlib1g-dev \
            openssh-client \
            libxml2-dev \
            nano \
            libzip-dev \
            linkchecker \
        --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-configure zip && \
    docker-php-ext-configure gd \
        --with-jpeg && \
    docker-php-ext-configure bcmath && \
    docker-php-ext-configure pcntl --enable-pcntl && \
    docker-php-ext-install \
        soap \
        zip \
        curl \
        bcmath \
        exif \
        gd \
        iconv \
        intl \
        opcache \
        pgsql \
        pdo_pgsql \
        pcntl

# Install imagick
RUN apt-get update && \
    apt-get -y --no-install-recommends install --fix-missing libmagickwand-dev && \
    rm -rf /var/lib/apt/lists/*

# Workarround until imagick is available in pecl with php8 support
# Imagick Commit to install
# https://github.com/Imagick/imagick
ARG IMAGICK_COMMIT="132a11fd26675db9eb9f0e9a3e2887c161875206"

RUN cd /usr/local/src && \
    git clone https://github.com/Imagick/imagick && \
    cd imagick && \
    git checkout ${IMAGICK_COMMIT} && \
    phpize && \
    ./configure && \
    make && \
    make install && \
    cd .. && \
    rm -rf imagick && \
    docker-php-ext-enable imagick



ENV PHP_USER_ID=33 \
    VERSION_COMPOSER_ASSET_PLUGIN=^1.3.0 \
    VERSION_PRESTISSIMO_PLUGIN=^0.3.0 \
    PATH=/src:/app/vendor/bin:/root/.composer/vendor/bin:$PATH \
    TERM=linux \
    COMPOSER_ALLOW_SUPERUSER=1

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin

COPY config-files /

# для build
# COPY docker/php-fpm/image-files/ /

WORKDIR /app/

EXPOSE 3001
