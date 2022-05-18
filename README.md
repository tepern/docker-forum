<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

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