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

// Route::apiResource('productsREST', 'Api\ProductsController');

Route::get('products/provider/{id}', 'Api\ProductsController@providers')->name('api.providers');
Route::get('products', 'Api\ProductsController@products')->name('api.products');
Route::get('images/first/{id}', 'Api\ImagesController@first')->name('images.first');
