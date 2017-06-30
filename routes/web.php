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

Route::get('/collect', 'Collector@show')->name('collect');
Route::get('/random-pair', 'Collector@randomPair')->name('random-pair');
Route::post('/collect', 'Collector@collect');

Route::get('/profile', 'User@showProfile')->name('user.profile');
Route::get('/profile/edit', 'User@showEditProfileForm')->name('user.profile.edit');
Route::post('/profile', 'User@postProfile');
Route::get('/profile/history', 'User@showHistory')->name('user.history');

Route::get('/interests', 'Interests@get')->name('interests');
