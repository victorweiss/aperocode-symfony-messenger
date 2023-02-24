# Symfony Messenger

## Demo for Elsass Web Devs - Apéro Code 
24 feb. 2023

## Install project

````shell
# Install dependencies
composer install

# Create and dump .env.local
composer dump-env dev

# Create database scheme
php bin/composer doctrine:migrations:migrate

# Watch and consume messages
php bin/console messenger:consume async -vv
````
