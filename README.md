<p class="filament-hidden">
<img src="https://banners.beyondco.de/filament-email.png?theme=light&packageManager=composer+require&packageName=rickdbcn%2Ffilament-email&pattern=architect&style=style_1&description=Log+emails+in+your+Filament+project&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" class="filament-hidden">
</p>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rickdbcn/filament-email.svg?style=flat-square)](https://packagist.org/packages/rickdbcn/filament-email)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rickdbcn/filament-email/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rickdbcn/filament-email/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rickdbcn/filament-email/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rickdbcn/filament-email/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rickdbcn/filament-email.svg?style=flat-square)](https://packagist.org/packages/rickdbcn/filament-email)
<a href="https://snyk.io/test/github/RickDBCN/filament-email"><img alt="Snyk Security" src="https://snyk.io/test/github/RickDBCN/filament-email/badge.svg"></a>
<a href="https://github.com/RickDBCN/filament-email/blob/main/LICENSE.md"><img alt="License" src="https://img.shields.io/github/license/RickDBCN/filament-email?color=blue&label=license"></a>

Log all outgoing emails in your Laravel project within your Filament panel. You can also resend emails with 1-click in case your recipient hasn't received your email.

## Installation

Enable docker .env config:

```bash
cp .env.production .env
```

Build and start docker containers:

```bash
docker-compose up -d --build
```

Enable application .env config:

```bash
cp src/.env.example src/.env
```

Install dependencies:

```bash
docker-compose exec php bash -c "cd ../ && composer install"
```

Run migrations with seeds:

```bash
docker-compose exec php bash -c "cd ../ && php artisan migrate --force --no-interaction --seed --seeder=EmailSeeder"
```

You're ready to go! Visit the url http://localhost:8001 in your browser, and login with:

-   **Username:** user@example.com
-   **Password:** 123Stella@

## Reverse proxy for production

Configuration for apache2 with Let's Encrypt:

```apacheconf
<VirtualHost *:80>

    ServerName filament-email-demo.example.com

    DocumentRoot /path/to/application/src/public/

    ErrorLog ${APACHE_LOG_DIR}/filament-email-demo.example.com-error.log
    CustomLog ${APACHE_LOG_DIR}/filament-email-demo.example.com-access.log combined

    RewriteEngine on
    RewriteCond %{SERVER_NAME} =filament-email-demo.example.com
    RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]

</VirtualHost>

<IfModule mod_ssl.c>
    <VirtualHost *:443>

        ServerName filament-email-demo.example.com

        DocumentRoot /var/www/filament-email-demo/src/public/

        ProxyPreserveHost On

        ProxyPass / http://127.0.0.1:8001/
        ProxyPassReverse / http://127.0.0.1:8001/

        ErrorLog ${APACHE_LOG_DIR}/filament-email-demo.example.com-ssl-error.log
        CustomLog ${APACHE_LOG_DIR}/filament-email-demo.example.com-ssl-access.log combined

        SSLCertificateFile /etc/letsencrypt/live/filament-email-demo.example.com/fullchain.pem
        SSLCertificateKeyFile /etc/letsencrypt/live/filament-email-demo.example.com/privkey.pem

        Include /etc/letsencrypt/options-ssl-apache.conf

    </VirtualHost>
</IfModule>

```