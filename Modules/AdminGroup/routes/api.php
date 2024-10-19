<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AdminGroup\App\Http\Controllers\Api\AdminGroupController;

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




Route::middleware(['auth:api'])->group(function () {

    // User resource routes
    Route::get('adminGroup', [AdminGroupController::class, 'index'])->name('users.index');
    Route::post('adminGroup', [AdminGroupController::class, 'store'])->name('users.store');
    Route::get('adminGroup/{id}', [AdminGroupController::class, 'show'])->name('users.show');
    Route::put('adminGroup/{id}', [AdminGroupController::class, 'update'])->name('users.update');
    Route::delete('adminGroup/{id}', [AdminGroupController::class, 'destroy'])->name('users.destroy');

    // Route for restoring a soft-deleted user (POST method)
    Route::get('adminGroup/restore/{id}', [AdminGroupController::class, 'restore']);

    // Route for force-deleting a user (DELETE method)
    Route::delete('adminGroup/force/delete/{id}', [AdminGroupController::class, 'forceDelete']);
});