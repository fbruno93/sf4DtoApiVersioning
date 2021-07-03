FROM php:8-fpm-alpine

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

RUN chmod +x /usr/local/bin/composer

WORKDIR /app

EXPOSE 9000
