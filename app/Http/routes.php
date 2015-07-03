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

Route::get('/', function () {
    return view('auth.login');
});

/*
 *  this will create all the routs for our Tools controller.
 */
Route::resource('tools', 'ToolsController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
 * this will make the routs for our authentication.
 *
 * but I used the explicit naming so that I can have a birds eye view straight
 * and that I don't need to go to artisan route:list.
 */
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);