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

Route::domain('wings.' . config('app.domain'))->prefix('/')->middleware(['teams_permission', 'auth'])->name('wings.')->group(function () {
    Route::get('/', 'WingsController@index')->name('index');

    Route::resource('/accounts', AccountController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/locations/{location}/nodes', NodeController::class, ['as' => 'locations']);
    Route::resource('/nests', NestsController::class);
    Route::resource('/nests/{nest}/eggs', NestEggsController::class, ['as' => 'nests']);


    // Route::resource('/nodes', NodeController::class)->except('store');
});