<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Automatic authentication-related routes added by
 *   $ php artisan make:auth
 */
Auth::routes();

Route::get('/', 'HomeController@index');