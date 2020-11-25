<?php

use Illuminate\Http\Request;

// Web app

Route::get('products/existence', 'Api\ProductsController@existence')->name('api.providers');
Route::get('products/provider/{id}', 'Api\ProductsController@providers')->name('api.providers');
Route::get('products', 'Api\ProductsController@products')->name('api.products');
Route::get('images/first/{id}', 'Api\ImagesController@first')->name('images.first');

// API
Route::group(['prefix' => 'v1'], function () {

    // Auth
    route::post('register', 'Api\App\AuthController@register')->name('api.v1.register');
    route::post('login', 'Api\App\AuthController@login')->name('api.v1.login');
    route::middleware('auth:api')->post('logout', 'Api\App\AuthController@logout')->name('api.v1.logout');

    // Products
    route::get('products', 'Api\App\ProductsController@productsList')->name('api.v1.products');
    route::get('details/products/{product}', 'Api\App\ProductsController@productsDetails')->name('api.v1.productsDetails');

    // Search
    route::get('search', 'Api\App\BrowserController@browser')->name('api.v1.browses');
});
