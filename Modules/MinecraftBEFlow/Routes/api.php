<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('minecraftBeFlow/{token}')->name('api.minecraftBeFlow.')->middleware('server')->group(function () {
    // Route::any('/server/version', 'ServerController@version')->name('server.version');
    // Route::post('/server/player', 'ServerController@player')->name('server.player');
    Route::post('/server/version', 'ServerController@version')->name('server.version');

    Route::post('/server/heartbeat', 'ServerController@heartbeat')->name('server.heartbeat');

    Route::post('/player/bind', 'PlayerController@bind')->name('player.bind');
    Route::get('/player/is_bind/{xuid}', 'PlayerController@is_bind')->name('player.is_bind');
    Route::post('/player/save/{xuid}', 'PlayerController@save')->name('player.save');

    Route::get('/player/transfer', 'PlayerController@transfer')->name('player.transfer');
});
