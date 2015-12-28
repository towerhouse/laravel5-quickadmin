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

Route::get('/', array('as' => 'welcome', 'uses' => 'FrontendController@index'));

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'), function() {
  Route::resource('users', 'UsersController');
  Route::get('/', array('as' => 'home', 'uses' => 'DashboardController@index'));
  Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
