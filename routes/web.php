<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::name('main.')->group(function () {
    Route::get('/', [Controllers\IndexController::class, 'index'])->name('index');
    Route::get('/version', [Controllers\AppController::class, 'index'])->name('version');
    Route::get('/about:edge', [Controllers\AppController::class, 'index'])->name('about');
});

Route::prefix('login')->name('login.')->group(function () {
    Route::get('redirect', [Controllers\AuthController::class, 'redirect'])->name('redirect');
    Route::get('/', [Controllers\AuthController::class, 'redirect'])->name('root_redirect');
    Route::get('callback', [Controllers\AuthController::class, 'callback'])->name('callback');
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::prefix('balance')->name('balance.')->group(function () {
        Route::get('/manage', [Controllers\BalanceController::class, 'payments'])->name('manage');
        Route::get('/add', [Controllers\BalanceController::class, 'paymentMethod'])->name('add');
        Route::post('/payments', [Controllers\BalanceController::class, 'addPayment'])->name('payments.add');
        Route::put('/manage/{id}', [Controllers\BalanceController::class, 'updateDefaultPayment'])->name('payments.update');
        Route::delete('/manage/{id}', [Controllers\BalanceController::class, 'removePayment'])->name('payments.delete');
        Route::post('/charge', [Controllers\BalanceController::class, 'charge'])->name('charge');
    });

    Route::get('/subscriptions', [Controllers\OrderController::class, 'subscriptions'])->name('subscriptions');
    Route::get('/redirectToBillingPortal', [Controllers\OrderController::class, 'redirectToBillingPortal'])->name('redirectToBillingPortal');

});

Route::prefix('orders')->name('orders.')->middleware('auth')->group(function () {
    Route::get('/all', [Controllers\OrderController::class, 'all'])->name('all');
    Route::get('/you', [Controllers\OrderController::class, 'you'])->name('you');
    Route::get('/team', [Controllers\OrderController::class, 'team'])->name('team')->middleware(['teams_permission']);
    Route::get('/cancel', [Controllers\OrderController::class, 'cancel'])->name('cancel');
    Route::get('/success', [Controllers\OrderController::class, 'payments'])->name('success');
});

Route::prefix('teams')->name('teams.')->middleware(['teams_permission', 'auth'])->group(function () {
    Route::get('/', [Controllers\TeamController::class, 'index'])->name('index')->withoutMiddleware(['teams_permission']);
    Route::get('/test/{team}', [Controllers\TeamController::class, 'test'])->name('test')->withoutMiddleware(['teams_permission']);
    Route::post('/afk', [Controllers\TeamController::class, 'afk'])->name('afk')->withoutMiddleware(['teams_permission']);
    Route::get('/team/{team_id}/invite/{email}', [Controllers\TeamController::class, 'invite'])->name('invites')->middleware('permission:team.edit');
    Route::put('/team', [Controllers\TeamController::class, 'update'])->name('update')->middleware('permission:team.edit');
    Route::resource('/team', Controllers\TeamController::class)->withoutMiddleware(['teams_permission']);
    Route::get('/team/{team}', [Controllers\TeamController::class, 'show'])->withoutMiddleware(['teams_permission'])->name('team.show');
    Route::delete('/team/{team}', [Controllers\TeamController::class, 'destroy'])->name('team.destroy')->middleware('permission:team.edit');
    Route::get('/invitations', [Controllers\TeamInvitationsController::class, 'index'])->name('invitations')->middleware(['permission:team.invitations.access']);
    Route::post('/invitations', [Controllers\TeamInvitationsController::class, 'invite'])->name('invite')->middleware(['permission:team.edit']);
    Route::delete('/invitations/{id}', [Controllers\TeamInvitationsController::class, 'deleteInvite'])->name('invite.delete')->middleware(['permission:team.edit']);
    Route::get('/received_invitations', [Controllers\TeamInvitationsController::class, 'myInvitations'])->name('invite.received')->withoutMiddleware('teams_permission');
    Route::post('/invitation/{id}/agree', [Controllers\TeamInvitationsController::class, 'agree'])->name('invite.agree')->withoutMiddleware('teams_permission');
    Route::post('/invitation/{id}/reject', [Controllers\TeamInvitationsController::class, 'reject'])->name('invite.reject')->withoutMiddleware('teams_permission');
    Route::delete('/team/user/kick/{id}', [Controllers\TeamController::class, 'kick'])->name('user.kick')->middleware(['permission:team.edit']);
    Route::post('/team/leave', [Controllers\TeamController::class, 'leave'])->name('team.leave');
    Route::post('/team/broadcast', [Controllers\TeamController::class, 'broadcast'])->name('team.broadcast');
    Route::post('/team/log', [Controllers\TeamController::class, 'log'])->name('team.log');
    Route::post('/team/writeToAdmin', [Controllers\TeamController::class, 'writeToAdmin'])->name('team.writeToAdmin');
});

Route::prefix('password')->name('password.')->middleware(['auth', 'password.confirm'])->withoutMiddleware(['teams_permission'])->group(function () {
    Route::get('/reset', [Controllers\AuthController::class, 'reset'])->name('reset');
    Route::post('/reset', [Controllers\AuthController::class, 'setup_password'])->name('setup_password');
    Route::get('/confirm', [Controllers\AuthController::class, 'confirm'])->name('confirm')->withoutMiddleware('password.confirm');
    Route::post('/confirm', [Controllers\AuthController::class, 'confirm_password'])->name('confirm_password')->withoutMiddleware('password.confirm');
});

Route::prefix('permission')->name('permission.')->middleware(['auth', 'teams_permission'])->group(function () {
    Route::get('/', [Controllers\PermissionController::class, 'index'])->name('index');
    Route::get('/all', [Controllers\PermissionController::class, 'all'])->name('all');
    Route::get('/roles/user/{user}', [Controllers\PermissionController::class, 'user_role_and_permission'])->name('user_role_and_permission')->middleware('permission:role.show');
    Route::post('/roles/user/{user}', [Controllers\PermissionController::class, 'assignRoleToUser'])->name('assignRoleToUser')->middleware('permission:role.edit');
    Route::post('/roles/user/{user}/permissions', [Controllers\PermissionController::class, 'givePermissionToUser'])->name('givePermissionToUser')->middleware('permission:role.edit');
    Route::delete('/roles/user/{user}/permissions/{permission}', [Controllers\PermissionController::class, 'deletePermissionFromUser'])->name('deletePermissionFromUser')->middleware('permission:role.edit');
    Route::delete('/roles/user/{user}', [Controllers\PermissionController::class, 'deleteRoleFromUser'])->name('deleteRoleFromUser')->middleware('permission:role.edit');
    Route::get('/roles/{id}', [Controllers\PermissionController::class, 'edit'])->name('role.edit')->middleware('permission:role.edit');
    Route::post('/roles', [Controllers\PermissionController::class, 'createRole'])->name('role.store')->middleware('permission:role.edit');
    Route::delete('/roles/{id}', [Controllers\PermissionController::class, 'deleteRole'])->name('role.delete')->middleware('permission:role.edit');
    Route::post('/roles/{name}', [Controllers\PermissionController::class, 'givePermissionToRole'])->name('role.givePermission')->middleware('permission:role.edit');
    Route::put('/roles/{name}', [Controllers\PermissionController::class, 'update'])->name('role.update')->middleware('permission:team.edit');
    Route::delete('/roles/{id}', [Controllers\PermissionController::class, 'deleteRole'])->name('role.delete')->middleware('permission:role.edit');
    Route::delete('/roles/{role}/permission/{permission_name}', [Controllers\PermissionController::class, 'revokePermissionFromRole'])->name('role.permission.revoke')->middleware('permission:role.edit');
});

Route::post('logout', [Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/home', [Controllers\IndexController::class, 'index'])->name('home');

Route::fallback(function () {
    return response()->json([
        'status' => 0,
        'code' => 404,
        'data' => 'Not Found',
    ]);
});
