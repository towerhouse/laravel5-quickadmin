## Laravel 5 Quickadmin - Dashboard site

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

This is a dashboard site built with [Laravel 5](https://github.com/laravel/laravel) that uses views from [Dashgum free theme](http://www.blacktie.co/2014/07/dashgum-free-dashboard/) 

The intention of this site is to be used as a boilerplate to the develop of your own system.

## Features

* User model powered with [Entrust role based permissions system](https://github.com/Zizaco/entrust/tree/laravel-5).
* A seeder to load the user's table with two users, one with admin role, the other with a plain role.
* All auth actions: login, logout, reset password.
* Dashboard page.
* User's manager pages: CRUD functionalities.
* 404, 403 and 500 pages.

## Installation

1. Clone de project.
2. Run composer install.
3. Run migrations with php artisan migrate.
4. Run the database seeders with php artisan db:seed.
5. Enter the admin using any of these credentials.

admin@quickadmin.com / adminadmin

plain@quickadmin.com / plainuser

6. Take a look by running php -S localhost:7777 inside the public folder.
