FROM php:8.3.6-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    curl \
    libzip-dev \
    libcurl4-gnutls-dev \
    libicu-dev \
    libmcrypt-dev \
    libxml2-dev \
    libxslt1-dev \
    libssh2-1-dev \
    libssh2-1 \
    libssl-dev \
    ssh \
    wget \
    libffi-dev \
    cron \
    rsyslog \
    iputils-ping \
    telnet \
    nano \
    default-mysql-client

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions bcmath curl fileinfo intl json mbstring mcrypt mysqli pdo_mysql \
    simplexml soap sockets xml xmlreader xmlrpc xmlwriter xsl zip ssh2 gd redis pcntl exif memcached sqlite3

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY src /var/www/html/

# Set working directory
WORKDIR /var/www/html/public

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
