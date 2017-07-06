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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/collect', 'CollectorController@show')->name('collect');
Route::get('/random-pair', 'CollectorController@randomPair')->name('random-pair');
Route::post('/collect', 'CollectorController@collect');

Route::get('/profile', 'UserController@showProfile')->name('user.profile');
Route::get('/profile/edit', 'UserController@showEditProfileForm')->name('user.profile.edit');
Route::post('/profile', 'UserController@postProfile');
Route::get('/profile/history', 'UserController@showHistory')->name('user.history');

Route::get('/interests', 'InterestsController@get')->name('interests');
