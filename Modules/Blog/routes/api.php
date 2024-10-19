<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Blog\App\Http\Controllers\Api\BlogController;

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

// Grouping routes with authentication middleware
Route::middleware(['auth:api'])->group(function () {

    // Blog resource routes
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // Route for restoring a soft-deleted blog (POST method)
    Route::get('blogs/restore/{blog}', [BlogController::class, 'restore']);

    // Route for force-deleting a blog (DELETE method)
    Route::delete('blogs/force/delete/{blog}', [BlogController::class, 'forceDelete']);
});
