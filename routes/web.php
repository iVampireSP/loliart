<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::domain('www.' . config('app.domain'))->prefix('/')->name('www.')->group(function () {
    Route::get('/', function () {
        return view('index');
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

Route::domain('login.' . config('app.domain'))->prefix('/')->name('login.')->group(function () {
    Route::get('redirect', [Controllers\AuthController::class, 'redirect'])->name('redirect');
    Route::get('/', [Controllers\AuthController::class, 'redirect'])->name('root_redirect');
    Route::get('callback', [Controllers\AuthController::class, 'callback'])->name('callback');
});


Route::domain('teams.' . config('app.domain'))->name('teams.')->middleware(['auth'])->group(function () {
    Route::get('/', [Controllers\TeamController::class, 'index'])->name('index');
    Route::resource('/team', Controllers\TeamController::class);
});

Route::domain('password.' . config('app.domain'))->prefix('/')->name('password.')->middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('/reset', [Controllers\AuthController::class, 'reset'])->name('reset');
    Route::post('/reset', [Controllers\AuthController::class, 'setup_password'])->name('setup_password');
    Route::get('/confirm', [Controllers\AuthController::class, 'confirm'])->name('confirm')->withoutMiddleware('password.confirm');
    Route::post('/confirm', [Controllers\AuthController::class, 'confirm_password'])->name('confirm_password')->withoutMiddleware('password.confirm');
});

// Route::fallback(function () {
//     return 0;
// });
