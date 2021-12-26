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

Route::prefix('frpTunnel')->middleware(['teams_permission', 'auth'])->name('frpTunnel.')->group(function () {
    Route::get('/', 'FrpTunnelController@index')->name('index');

    Route::prefix('servers')->name('servers.')->group(function () {
        Route::get('/', 'ServerController@index')->name('index');
    });

});
