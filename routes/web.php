<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::domain('www.' . config('app.domain'))->prefix('/')->name('www.')->group(function () {
    Route::get('/', function () {
        return 1;
    })->name('index');
});

Route::domain('app.' . config('app.domain'))->prefix('/')->name('app.')->group(function () {
    Route::get('/', [Controllers\AppController::class, 'index'])->name('index');
});

Route::domain(config('app.domain'))->prefix('/')->name('main.')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');
});

Route::fallback(function () {
    //
});