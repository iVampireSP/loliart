<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/wings')->middleware(['teams_permission', 'auth'])->name('wings.')->group(function () {
    Route::get('/', 'WingsController@index')->name('index');

    Route::resource('/accounts', AccountController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/locations/{location}/nodes', NodeController::class, ['as' => 'locations']);
    Route::get('/locations/{location}/nodes', 'LocationController@nodes')->name('locations.nodes');
    Route::resource('/nests', NestsController::class);
    Route::resource('/nests/{nest}/eggs', NestEggsController::class, ['as' => 'nests']);
    Route::get('/nests/{nest_id}/list', 'NestsController@list')->name('nests.list');
    Route::get('/eggs/{id}', 'NestEggsController@images')->name('egg.images');
    Route::get('/servers/explore', 'ServerController@explore')->name('servers.explore');
    Route::resource('/servers', ServerController::class);
});
