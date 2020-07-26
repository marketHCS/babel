<?php

Route::prefix('/admin')->group(function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    Route::resource('users', 'admin\UsersController')->except('destroy', 'store', 'create');
    Route::resource('addresses', 'admin\AddressesController')->except('index', 'store', 'create', 'show');
    Route::put('users/delete/{user}', 'admin\UsersController@delete')->name('users.delete');
    // Route::put('users/{$user}/admin', 'admin\UsersController@admin')->name('users.admin');

    Route::resource('products', 'admin\ProductsController')->except('destroy');
    Route::put('products/delete/{product}', 'admin\ProductsController@delete')->name('products.delete');
    Route::get('products/images/{product}', 'admin\ProductsController@images')->name('products.images');
    Route::delete('products/images/delete/{product}', 'admin\ImagesProductController@destroy')->name('products.destroyImage');
});
