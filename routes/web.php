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

Route::domain('www.' . config('app.domain'))->prefix('/')->name('www.')->group(function () {
    Route::get('/', function () {
        return 1;
    })->name('index');
});