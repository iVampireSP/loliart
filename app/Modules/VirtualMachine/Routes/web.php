<?php

use Illuminate\Support\Facades\Route;

Route::domain('virtualMachine.' . config('app.domain'))->prefix('/')->as('virtualMachine.')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');
});