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

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return redirect('/tools');
});


// routes for Tools controller.
Route::resource('tools', 'ToolsController');
Route::get('tools/image/{image}', 'ToolsController@showImage');

// routes for Renting controller
Route::post('renting/{tool}', 'RentingController@store');

// routes for Roles controller
Route::get('roles', 'RolesController@index');
Route::patch('roles/{user}', 'RolesController@update');

// routes for Tags controller
Route::get('tags', 'TagsController@index');
Route::get('tags/create', 'TagsController@create');
Route::post('tags', 'TagsController@store');
Route::get('tags/{tags}/edit', 'TagsController@edit');
Route::patch('tags/{tags}', 'TagsController@update');
Route::delete('tags/{tags}', 'TagsController@destroy');

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
 * and that I don't need to go to artisan route:list to see the routes.
 */
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);