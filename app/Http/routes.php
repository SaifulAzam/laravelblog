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
Route::get('/', 'BlogsController@index');
Route::get('about', 'PagesController@about');
Route::resource('blogs', 'BlogsController');
Route::resource('categories', 'CategoriesController');

Route::get('contact',
['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact',
['as' => 'contact_send', 'uses' => 'PagesController@contact_send']);


Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/signup', array('as' => 'signup', 'uses' => 'Auth\AuthController@getRegister'));
Route::post('/signup', array('as' => 'signup', 'uses' => 'Auth\AuthController@postRegister'));