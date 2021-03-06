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

//Route::get('/import', 'RegistrationController@import');

Route::get('/', 'IndexController@home')->name('home');

Route::get('/lang/{lang?}',[
    'uses'=>'LangSwitcherController@LangSwitcher',
    'as'  => 'lang.switch'
]);

Route::get('/offline', function(){
   return view('offline');
});

Route::get('/offer/{offer}', 'OffersController@show');

Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register/{location}', 'UsersController@register');

Route::get('/loginstep1', 'UsersController@loginstep1')->name('login');
Route::post('/loginstep2', 'UsersController@loginstep2');
Route::post('/login', 'UsersController@login');

Route::get('/user/confirm/{confirmationCode}', 'UsersController@confirm');
Route::post('/user/password', 'UsersController@password');

Route::get('/logout', 'UsersController@logout');

Route::get('/maps', 'IndexController@maps');
Route::get('/legal', 'IndexController@legal');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

//Auth:
Route::get('/mycard', 'MyCardController@show');
Route::get('/profile', 'ProfileController@show');
Route::post('/update', 'ProfileController@update')->name('profile.update');

Route::get('/help', 'HelpController@show');
Route::get('/help/{device}', 'HelpController@device');
Route::get('/mycardhelp', 'HelpController@cardhelp');

//Push
Route::get('/push/optin/{subscription_id}', 'PushController@saveSubscriptionId');
Route::get('/push/optout/{subscription_id}', 'PushController@removeSubscriptionId');

//Formulaire Inscription
Route::get('/activation/form', 'ActivationController@form');
Route::post('/activation/store', 'ActivationController@store');