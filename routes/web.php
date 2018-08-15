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

Route::get('/generate','IndexController@cards');

Route::get('/', 'IndexController@home')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register/{location}', 'UsersController@register');

Route::get('/user/confirm/{confirmationCode}', 'UsersController@confirm');
Route::post('/user/password', 'UsersController@password');

Route::get('/maps', 'IndexController@maps');