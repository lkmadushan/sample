#  Sample Code

> Laravel 5.6 (MariaDB, PHP7.1 and Nginx)

## How to run (using Docker)

Make sure you have already installed [Docker](https://www.docker.com) and [Docker Compose](https://github.com/docker/compose/releases).

```bash
# Download Repository
git clone https://bitbucket.org/lkmadushan/medi.git
cd medi
cp .env.example .env

# Start Laravel application (Once done you can access application through http://localhost)
docker-compose up -d
docker-compose exec app sh -c "cd /var/www/html && composer install"
docker-compose exec app sh -c "cd /var/www/html && php artisan key:generate"

# Run migrations and seeds
docker-compose exec app sh -c "cd /var/www/html && php artisan migrate --seed"

# Run unit tests
docker-compose exec app sh -c "cd /var/www/html && ./vendor/bin/phpunit"
```

## Includes

- Paginated users, create, show a user, update a user using TDD
- Relationships between models
- ER diagram (in database directory)
- Sample frontend design using TailwindCSS
- Vue component to fetch and render List of Users
- Migrations, Seeds and Model Factories
- Docker based development environment

## Notes

- Since this is a small application I didn't use [Fractal](https://fractal.thephpleague.com/) or [API Resource](https://laravel.com/docs/5.6/eloquent-resources) to transform Eloquent models (but it's a good practise to use in complex applications)
- Didn't use repository pattern since this is small application but we can consider it using more complex applications.
- I would like to keep my code as simple as possible and I will refactor my code when things getting complex. Unit Tests help me a lot at this moment to validate implemented features are still working.
