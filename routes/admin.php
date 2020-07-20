<?php

Route::prefix('/admin')->group(function () {
    Route::get('/', 'admin\DashboardController@index');
});
