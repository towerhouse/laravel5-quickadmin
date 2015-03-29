<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DashboardController@index');
Route::get('/home', 'DashboardController@index');

//Protect actions on the user controller => https://github.com/Zizaco/entrust
Entrust::routeNeedsRole('users*', 'admin');

Route::get('/users', 'UsersController@index');
Route::get('/users/edit/{id?}', 'UsersController@edit');
Route::post('/users', 'UsersController@store');
Route::post('/users/destroy', 'UsersController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
