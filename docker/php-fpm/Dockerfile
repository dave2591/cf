FROM php:7.4.0-fpm-buster

EXPOSE 9000

RUN apt-get update

# Postgres
RUN apt-get install -y libpq-dev git zip postgresql-client && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql && \
    # https://github.com/tianon/docker-brew-debian/issues/65
    mkdir -p /usr/share/man/{man1,man7}

# Xdebug
ARG XDEBUG_VERSION=2.8.0beta1
RUN mkdir -p /usr/src/php/ext/xdebug && \
    curl -fsSL https://xdebug.org/files/xdebug-${XDEBUG_VERSION}.tgz | tar xz -C /usr/src/php/ext/xdebug --strip 1 && \
    docker-php-ext-install xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN sed -i "s/xdebug.remote_autostart=0/xdebug.remote_autostart=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.remote_enable=0/xdebug.remote_enable=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.cli_color=0/xdebug.cli_color=1/" /usr/local/etc/php/conf.d/xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR "/var/www/currencyfair"
ADD . "/var/www/currencyfair"

RUN chown -R www-data:www-data '/var/www/currencyfair'
RUN chmod -R 0777 '/var/www/currencyfair/'

CMD ["php-fpm"]
