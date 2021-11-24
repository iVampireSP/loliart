<?php

use Illuminate\Support\Facades\Route;

// Route::get('/ptero', 'PterodactylPanelController@index');

Route::domain('pterodactyl.loliart.test')->prefix('/')->name('ptero.')->group(function () {
    Route::get('/', 'PterodactylPanelController@index')->name('index');
});