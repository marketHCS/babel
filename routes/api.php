<?php

use Illuminate\Http\Request;

// Web app

Route::get('products/existence', 'Api\ProductsController@existence')->name('api.providers');
Route::get('products/provider/{id}', 'Api\ProductsController@providers')->name('api.providers');
Route::get('products', 'Api\ProductsController@products')->name('api.products');
Route::get('images/first/{id}', 'Api\ImagesController@first')->name('images.first');

// API Android
Route::group(['prefix' => 'v1'], function () {

    // Auth
    route::post('register', 'Api\App\AuthController@register')->name('api.v1.register');
    route::post('login', 'Api\App\AuthController@login')->name('api.v1.login');
    route::middleware('auth:api')->post('logout', 'Api\App\AuthController@logout')->name('api.v1.logout');
    route::middleware('auth:api')->get('user', 'Api\App\AuthController@user')->name('api.v1.user');

    // Products
    route::get('products', 'Api\App\ProductsController@productsList')->name('api.v1.products');
    route::get('details/products/{product}', 'Api\App\ProductsController@productsDetails')->name('api.v1.productsDetails');

    // Search
    route::get('search', 'Api\App\BrowserController@browser')->name('api.v1.browses');

    // WishList
    route::middleware('auth:api')->get('wishlist', 'Api\App\WishListController@index')->name('api.v1.wishList');
    route::middleware('auth:api')->get('wishlist/add/{id}', 'Api\App\WishListController@store')->name('api.v1.wishList.store');
    route::middleware('auth:api')->get('wishlist/destroy/{wishlist}', 'Api\App\WishListController@destroy')->name('api.v1.wishList.destroy');
    route::middleware('auth:api')->get('wishlist/reset/', 'Api\App\WishListController@reset')->name('api.v1.wishList.reset');
});
