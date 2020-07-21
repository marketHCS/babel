<?php

Route::prefix('/admin')->group(function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    Route::get('/users', 'admin\UserController@index')->name('admin.users');
});
