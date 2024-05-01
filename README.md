## Installation

Enable .env config:

```bash
cp .env.production .env
```

Build and start docker containers:

```bash
docker-compose up -d --build
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
