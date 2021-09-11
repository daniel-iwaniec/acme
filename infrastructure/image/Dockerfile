FROM php:8.0-fpm-buster

RUN apt-get update && \
    apt-get install -y --no-install-recommends libzip-dev unzip && \
    rm -rf /var/lib/apt/lists/* \ && \
    docker-php-ext-install zip bcmath && \
    php -r "copy('https://getcomposer.org/installer', 'setup.php');" && \
    php setup.php --install-dir=/usr/local/bin --filename=composer --version=2.1.6 && \
    php -r "unlink('setup.php');" \
