#!/bin/sh

# Install laravel dependencies
cp .env.example .env
composer install

# Setup and run docker containers using Laradock
rm -rf laradock
git clone https://github.com/Laradock/laradock.git
cp .laradock.env.example laradock/.env
cd laradock
docker-compose up -d nginx mysql phpmyadmin redis workspace
# Run migration inside the container
docker-compose exec workspace bash -c "php artisan migrate:refresh --seed"

# Finalize laravel setup
cd ..
composer dump-autoload
php artisan view:clear
php artisan cache:clear
php artisan clear-compiled