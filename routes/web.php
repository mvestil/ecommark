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

Auth::routes();

Route::get('/', '\App\Http\Controllers\Web\ProductController@list')->name('products.list');
Route::get('/products/{id}', '\App\Http\Controllers\Web\ProductController@show')->name('products.web.show');

Route::get('/home', 'HomeController@index')->name('home');
