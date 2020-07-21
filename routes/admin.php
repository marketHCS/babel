<?php

Route::prefix('/admin')->group(function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    Route::resource('users', 'admin\UsersController');
});
