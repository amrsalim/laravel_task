<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Category\App\Http\Controllers\Api\CategoriesController;

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

    // User resource routes
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/{user}', [CategoriesController::class, 'show'])->name('categories.show');
    Route::put('categories/{user}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/{user}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    // Route for restoring a soft-deleted user (POST method)
    Route::get('categories/restore/{user}', [CategoriesController::class, 'restore']);

    // Route for force-deleting a user (DELETE method)
    Route::delete('categories/force/delete/{user}', [CategoriesController::class, 'forceDelete']);
});
