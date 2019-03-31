<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
// Get the authenticated user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('products', '\App\Http\Controllers\Api\ProductController@index')->name('products.index');
Route::get('products/{product}', '\App\Http\Controllers\Api\ProductController@show')->name('products.show');
Route::get('categories', '\App\Http\Controllers\Api\CategoryController@index')->name('categories.index');


