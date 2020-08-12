<?php

Route::prefix('/admin')->group(function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');

    // Users CRUD
    Route::resource('users', 'admin\UsersController')->except('destroy', 'store', 'create');
    Route::put('users/delete/{user}', 'admin\UsersController@delete')->name('users.delete');
    Route::put('users/{$user}/admin', 'admin\UsersController@admin')->name('users.admin');

    // Addresses CRUD
    Route::resource('addresses', 'admin\AddressesController')->except('index', 'store', 'create', 'show');

    // Products CRUD
    Route::resource('products', 'admin\ProductsController')->except('destroy');
    Route::put('products/delete/{product}', 'admin\ProductsController@delete')->name('products.delete');

    // Inventories CRUD
    // Route::resource('inventories', 'admin\InventoryController')->except('destroy', 'index', 'create', 'store', 'show');

    // Images CRUD
    Route::get('products/images/{product}', 'admin\ProductsController@images')->name('products.images');
    Route::delete('products/images/delete/{id}', 'admin\ImagesProductController@destroy')->name('products.destroyImage');
    Route::post('products/images/store/{product}', 'admin\ImagesProductController@store')->name('products.storeImage');

    // Prodividers CRUD
    Route::resource('providers', 'admin\ProviderController')->except('destroy');
    Route::put('providers/delete/{provider}', 'admin\ProviderController@delete')->name('providers.delete');

    // Categories CRUD
    Route::resource('categories', 'admin\CategoryController')->except('destroy');
    Route::put('categories/delete/{category}', 'admin\CategoryController@delete')->name('categories.delete');

    // Buys CRUD
    Route::resource('buys', 'admin\BuyController')->except('edit', 'destroy', 'update');
    Route::put('buys/status/{buy}', 'admin\BuyController@status')->name('buys.status');

    // Sells CRUD
    Route::resource('sells', 'admin\SellController')->except('edit', 'destroy', 'update', 'create', 'store', 'edit');
    Route::put('sells/status/{sell}', 'admin\SellController@status')->name('sells.status');
    Route::put('sells/shipment/{sell}', 'admin\SellController@shipment')->name('sells.shipment');
    // Route::put('buys/new/{$id}', 'admin\BuyController@stores')->name('buys.creando');
});
