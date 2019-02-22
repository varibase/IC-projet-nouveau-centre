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

Route::get('/', 'AdminController@index');

Route::post('/login', 'AdminController@signin');
Route::get('/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::post('/update', 'AdminController@update');
Route::post('/create', 'AdminController@create');

Route::post('/partners/{partner?}', 'PartnersController@store');
Route::get('/partners', 'PartnersController@index');
Route::get('/partners/edit/{partner?}', 'PartnersController@edit');
Route::post('/offers/{offer?}', 'OffersController@store');
Route::get('/offers', 'OffersController@index');
Route::get('/offers/edit/{offer?}', 'OffersController@edit');

