<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::domain('www.' . config('app.domain'))->prefix('/')->name('www.')->group(function () {
    Route::view('/', 'index')->name('index');
    Route::get('test-broadcast', function () {
        broadcast(new \App\Events\UserEvent);
    });
});

Route::domain('app.' . config('app.domain'))->prefix('/')->name('app.')->group(function () {
    Route::get('/', [Controllers\AppController::class, 'index'])->name('index');
});

Route::domain(config('app.domain'))->prefix('/')->name('main.')->group(function () {
    Route::view('/', 'index')->name('index');
});

Route::domain('login.' . config('app.domain'))->prefix('/')->name('login.')->group(function () {
    Route::get('redirect', [Controllers\AuthController::class, 'redirect'])->name('redirect');
    Route::get('/', [Controllers\AuthController::class, 'redirect'])->name('root_redirect');
    Route::get('callback', [Controllers\AuthController::class, 'callback'])->name('callback');
});


Route::domain('teams.' . config('app.domain'))->name('teams.')->middleware(['teams_permission', 'auth'])->group(function () {
    Route::get('/', [Controllers\TeamController::class, 'index'])->name('index')->withoutMiddleware(['teams_permission']);
    Route::post('/afk', [Controllers\TeamController::class, 'afk'])->name('afk')->withoutMiddleware(['teams_permission']);
    Route::get('/team/{team_id}/invite/{email}', [Controllers\TeamController::class, 'invite'])->name('invite')->middleware('permission:team_invite');
    Route::resource('/team', Controllers\TeamController::class);
});

Route::domain('password.' . config('app.domain'))->prefix('/')->name('password.')->middleware(['auth', 'password.confirm'])->withoutMiddleware(['teams_permission'])->group(function () {
    Route::get('/reset', [Controllers\AuthController::class, 'reset'])->name('reset');
    Route::post('/reset', [Controllers\AuthController::class, 'setup_password'])->name('setup_password');
    Route::get('/confirm', [Controllers\AuthController::class, 'confirm'])->name('confirm')->withoutMiddleware('password.confirm');
    Route::post('/confirm', [Controllers\AuthController::class, 'confirm_password'])->name('confirm_password')->withoutMiddleware('password.confirm');
});

Route::domain('permission.' . config('app.domain'))->prefix('/')->name('permission.')->middleware(['auth'])->group(function () {
    Route::get('/', [Controllers\PermissionController::class, 'index'])->name('index')->middleware(['teams_permission']);
    Route::get('/all', [Controllers\PermissionController::class, 'all'])->name('all');
});

Route::post('logout', [Controllers\AuthController::class, 'logout'])->name('logout');


// Route::fallback(function () {
//     return 0;
// });