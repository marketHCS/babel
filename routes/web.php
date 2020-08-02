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

// Autenticación
Auth::routes();

// Home
Route::get('/', 'IndexController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

// Product
Route::get('product', 'client\ProductController@index')->name('product.index');
Route::get('product/category/{id}', 'client\ProductController@category')->name('product.category');
Route::get('product/{product}', 'client\ProductController@show')->name('product.show');
Route::get('product/sex/boys', 'client\ProductController@boys')->name('product.boys');
Route::get('product/sex/girls', 'client\ProductController@girls')->name('product.girls');

// Cart
Route::get('cart', 'backend\CartController@index')->name('cart');
Route::post('cart/{id}', 'backend\CartController@store')->name('cart.store');
Route::get('delete/cart/{id}', 'backend\CartController@destroy')->name('cart.destroy');
Route::get('reset/cart', 'backend\CartController@reset')->name('cart.reset');
