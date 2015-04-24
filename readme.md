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

1. Clone the project.
2. Run composer install.
3. Run migrations with php artisan migrate.
4. Run the user's database seeders with php artisan db:seed --class=UserTableSeeder
5. Enter the admin using any of these credentials.

admin@quickadmin.com / adminadmin

plain@quickadmin.com / plainuser

6. Take a look by running php artisan serve on the root of the project.

## Customizations

To customize the sidebar menu, the meta title, and the title on the admin layout go to app/config/site.

Sidebar customization works like this:

* The key of the item is the path as it appears on routing.php without any initial slash.
* If you want a menu with a submenu you specify type "nested" and add the items keys with the array of subelements. Otherwise type is "simple".
* Icon is the name of the icon, use the icons on [Font Awesome Icons](http://fortawesome.github.io/Font-Awesome/icons/).
* Name is the name you want as title on the menu.
* If you specify the property role, then the menu will only display if the user has that role.

<pre>
'menu_items' => array(
    '/' => array(
        'type' => 'simple',
        'name' => 'Dashboard',
        'icon' => 'dashboard'
    ),
    'users' => array(
        'type' => 'nested',
        'name' => 'Users',
        'icon' => 'user',
        'role' => 'admin',
        'items' => array(
            'users' => array(
                'name' => 'List',
                'role' => 'admin',
            ),
            'users/edit' => array(
                'name' => 'Create user',
                'role' => 'admin',
            )
        )
    )
)
</pre>
