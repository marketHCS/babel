<?php

/**
 * Document: Api routes.
 * Created on: July 8th, 2020
 * Author: Hector Jama Escobedo
 * Project: Babel
 * Subject: Web
 * Description: In file, we going to declare the routes for the api system.
 */


use Illuminate\Http\Request;

// Web app routes

// Route type GET for the inventories
Route::get(
  // route's URL
  'products/existence',

  // route controller
  'Api\ProductsController@existence'
)

  // route name
  ->name('api.providers');




// Route type GET for the product provider
Route::get('products/provider/{id}', 'Api\ProductsController@providers')->name('api.providers');

// Route type GET for the inventories
Route::get('products', 'Api\ProductsController@products')->name('api.products');

// Route type GET for the product's images
Route::get('images/first/{id}', 'Api\ImagesController@first')->name('images.first');

// API Android routes
Route::group(['prefix' => 'v1'], function () {

    // Auth routes

    // Route type POST for the register
    route::post('register', 'Api\App\AuthController@register')->name('api.v1.register');
    // Route type POST for the login
    route::post('login', 'Api\App\AuthController@login')->name('api.v1.login');
    route::post('web/login', 'Api\App\AuthController@loginWeb')->name('api.v1.login.web');
    route::middleware('auth:api')->post('logout', 'Api\App\AuthController@logout')->name('api.v1.logout');
    // Route type POST with authentication check for user profile data
    route::middleware('auth:api')->get('user', 'Api\App\AuthController@user')->name('api.v1.user');


    // Products routes

    // Route type GET for the products list
    route::get('products', 'Api\App\ProductsController@productsList')->name('api.v1.products');
    // Route type GET for the product details
    route::get('details/products/{product}', 'Api\App\ProductsController@productsDetails')->name('api.v1.productsDetails');
    // Route type POST for the shopping cart
    route::post('cart', 'Api\App\CartController@cart')->name('api.v1.cart');


    // Search route

    // Route type get for the serch of products
    route::get('search', 'Api\App\BrowserController@browser')->name('api.v1.browses');

    // WishList routes

    // Route type GET with authentication check for wishlist
    route::middleware('auth:api')->get('wishlist', 'Api\App\WishListController@index')->name('api.v1.wishList');

    // Route type GET with authentication check for add product to wishlist
    route::middleware('auth:api')->get('wishlist/add/{id}', 'Api\App\WishListController@store')->name('api.v1.wishList.store');

    // Route type GET with authentication check for delete product of wishlist
    route::middleware('auth:api')->get('wishlist/destroy/{wishlist}', 'Api\App\WishListController@destroy')->name('api.v1.wishList.destroy');

    // Route type GET with authentication check for reset the wishlist
    route::middleware('auth:api')->get('wishlist/reset/', 'Api\App\WishListController@reset')->name('api.v1.wishList.reset');
});
