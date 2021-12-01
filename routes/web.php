<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::domain('www.' . config('app.domain'))->prefix('/')->name('www.')->group(function () {
    Route::view('/', 'index')->name('index');
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
    Route::get('/team/{team_id}/invite/{email}', [Controllers\TeamController::class, 'invite'])->name('invite')->middleware('permission:team.invite');
    Route::resource('/team', Controllers\TeamController::class)->withoutMiddleware(['teams_permission']);
    Route::get('/invitations', [Controllers\TeamInvitationsController::class, 'index'])->name('invitations')->middleware(['permission:team.invitations.access']);
    Route::post('/invitations', [Controllers\TeamInvitationsController::class, 'invite'])->name('invite')->middleware(['permission:team.invitations.invite']);
    Route::delete('/invitations/{id}', [Controllers\TeamInvitationsController::class, 'deleteInvite'])->name('invite.delete')->middleware(['permission:team.invitations.delete']);
    Route::get('/received_invitations', [Controllers\TeamInvitationsController::class, 'myInvitations'])->name('invite.received')->withoutMiddleware('teams_permission');
    Route::post('/invitation/{id}/agree', [Controllers\TeamInvitationsController::class, 'agree'])->name('invite.agree')->withoutMiddleware('teams_permission');
    Route::post('/invitation/{id}/reject', [Controllers\TeamInvitationsController::class, 'reject'])->name('invite.reject')->withoutMiddleware('teams_permission');
});

Route::domain('password.' . config('app.domain'))->prefix('/')->name('password.')->middleware(['auth', 'password.confirm'])->withoutMiddleware(['teams_permission'])->group(function () {
    Route::get('/reset', [Controllers\AuthController::class, 'reset'])->name('reset');
    Route::post('/reset', [Controllers\AuthController::class, 'setup_password'])->name('setup_password');
    Route::get('/confirm', [Controllers\AuthController::class, 'confirm'])->name('confirm')->withoutMiddleware('password.confirm');
    Route::post('/confirm', [Controllers\AuthController::class, 'confirm_password'])->name('confirm_password')->withoutMiddleware('password.confirm');
});

Route::domain('permission.' . config('app.domain'))->prefix('/')->name('permission.')->middleware(['auth', 'teams_permission'])->group(function () {
    Route::get('/', [Controllers\PermissionController::class, 'index'])->name('index');
    Route::get('/all', [Controllers\PermissionController::class, 'all'])->name('all');
    Route::get('/roles/{id}', [Controllers\PermissionController::class, 'edit'])->name('role.edit')->middleware('permission:role.edit');
    Route::post('/roles', [Controllers\PermissionController::class, 'createRole'])->name('role.store')->middleware('permission:role.create');
    Route::delete('/roles/{id}', [Controllers\PermissionController::class, 'deleteRole'])->name('role.delete')->middleware('permission:role.delete');
    Route::post('/roles/{name}', [Controllers\PermissionController::class, 'givePermissionToRole'])->name('role.givePermission')->middleware('permission:role.givePermission');
    Route::put('/roles/{name}', [Controllers\PermissionController::class, 'update'])->name('role.update')->middleware('permission:team.update');
});

Route::post('logout', [Controllers\AuthController::class, 'logout'])->name('logout');


Route::fallback(function () {
    return response()->json([
        'status' => 0,
        'code' => 404,
        'data' => 'Not Found',
    ]);
});