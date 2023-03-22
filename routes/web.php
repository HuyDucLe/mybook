<?php

use Illuminate\Support\Facades\Route;


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

Route::get('hello', function () {
    return 'Hello World';
});



Route::get('/', 'HomeController@index');
Route::view ('cart', 'cart');

Route::get  ('item/{id}', 'ItemController@index');
Route::get('group/{id}', 'GroupController@index');
Route::get('news',       'GroupController@news');
Route::get('combos',     'GroupController@combos');
Route::get('releases',   'GroupController@releases');

Route::get  ('search', 'SearchController@search');
Route::post ('search', 'SearchController@searchFullText');

Route::get  ('register', 'UserAuthController@show');
Route::post ('register', 'UserAuthController@register');
Route::get  ('login',    'UserAuthController@show');
Route::post ('login',    'UserAuthController@login');
Route::get ('logout',    'UserAuthController@logout');

Route::resource('admin', 'BookController');









