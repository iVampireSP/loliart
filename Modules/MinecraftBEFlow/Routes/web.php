<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('minecraftBeFlow')->middleware(['teams_permission', 'auth'])->name('minecraftBeFlow.')->group(function () {
    Route::get('/', 'MinecraftBEFlowController@index')->name('index');
    Route::get('/player', 'PlayerController@index')->name('player');
    Route::post('/player', 'PlayerController@store')->name('player.store');

    Route::resource('/servers', 'ServerController');

    // Route::prefix('/servers')->name('servers.')->group(function () {
    //     // Route::resource('')
    // });
});
