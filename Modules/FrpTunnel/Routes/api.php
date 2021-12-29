<?php

use Illuminate\Http\Request;

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

Route::prefix('frpTunnel')->name('api.frpTunnel.')->group(function () {
    Route::get('/handler/{tunnel}', 'PortManagerController@handler')->name('handler');
});
