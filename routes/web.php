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


Route::get('/', 'IndexController@home')->name('home');

Route::get('/lang/{lang?}',[
    'uses'=>'LangSwitcherController@LangSwitcher',
    'as'  => 'lang.switch'
]);

Route::get('/offer/{offerid}', 'OfferController@show');

// attention check auth
Route::get('/mycard', 'MyCardController@show');

Route::get('/register', 'RegistrationController@create');
Route::post('/register/{location}', 'UsersController@register');

Route::get('/loginstep1', 'UsersController@loginstep1')->name('login');
Route::post('/loginstep2', 'UsersController@loginstep2');
Route::post('/login', 'UsersController@login');

Route::get('/user/confirm/{confirmationCode}', 'UsersController@confirm');
Route::post('/user/password', 'UsersController@password');

Route::get('/logout', 'UsersController@logout');

Route::get('/maps', 'IndexController@maps');