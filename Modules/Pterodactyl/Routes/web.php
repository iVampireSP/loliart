<?php

use Illuminate\Support\Facades\Route;

Route::domain('pterodactyl.' . config('app.domain'))->prefix('/')->as('www.')->group(function () {
    Route::get('/', 'PterodactylController@index');
});