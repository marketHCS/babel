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
Route::get('product/{product}', 'client\ProductController@show')->name('product.show');

// Cart
Route::get('cart', 'backend\ProductController@index')->name('cart');
Route::post('cart/{id}', 'backend\ProductController@addToCart')->name('addToCart');
