FROM northern/php-symfony:8.1-fpm

ARG UID
ARG GID

RUN usermod -u $UID www-data || true
RUN groupmod -g $GID www-data || true

COPY ./wait-for-it.sh /var/www/wait-for-it.sh

RUN chmod +x /var/www/wait-for-it.sh

COPY ./app.ini /usr/local/etc/php/conf.d/app.ini

RUN mkdir -p /var/www/html

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html

USER www-data
