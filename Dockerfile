FROM dunglas/frankenphp

RUN apt-get update && apt-get install nano -y

RUN install-php-extensions \
    bcmath curl fileinfo intl json mbstring mcrypt mysqli pdo_mysql \
    simplexml soap sockets xml xmlreader xmlrpc xmlwriter xsl zip ssh2 \
    gd redis pcntl exif memcached sqlite3

WORKDIR /app

COPY ./src/composer.json composer.json
COPY ./src/composer.lock composer.lock

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-scripts

COPY src .

#RUN cp .env.example .env
#
#RUN php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
#
#RUN php artisan migrate --no-interaction
#
#RUN php artisan db:seed
#
#RUN php artisan db:seed --class=EmailSeeder

RUN php artisan octane:install --server=frankenphp

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]