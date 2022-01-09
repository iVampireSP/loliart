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
    Route::get('/', 'PlayerController@index')->name('index');
    Route::get('/explore', 'ServerController@explore')->name('servers.explore');
    Route::get('/player', 'PlayerController@index')->name('player');
    Route::post('/player', 'PlayerController@store')->name('player.store');
    // Route::post('/transfer/{server_id}', 'PlayerController@web_transfer')->name('player.web_transfer');
    Route::delete('/player', 'PlayerController@destroy')->name('player.destroy');

    Route::resource('/servers', 'ServerController');
    Route::resource('/groups', 'GroupController');

    // Route::prefix('/servers')->name('servers.')->group(function () {
    //     // Route::resource('')
    // });
});
