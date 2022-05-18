## Features

Laravel 7

Node.js

Laravel-admin

## Installation

git clone  https://github.com/tepern/docker-forum.git

cd docker-forum

Create .env from .env.example

## API

git checkout forum-api

docker-compose up --build -d

## Migration

docker-compose exec php bash

php artisan migrate

## Administrative interface 

php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

Visit forum.loc/admin

## Seeding

docker-compose exec php bash

php artisan migrate:fresh --seed

## Tests

docker-compose exec php bash

php artisan test
