<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\Api\AuthController;


Route::prefix('v1')->name('api.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('api.login');
        Route::post('register', [AuthController::class, 'register'])->name('api.register');
    });

    Route::middleware('auth:api')->group(function () {
        config()->set('auth.defaults.guard', 'api');
        config()->set('jwt.user', 'App\Models\User');
        config()->set('auth.providers.users.model', User::class);
        Route::get('account', [AuthController::class, 'account'])->name('api.account');
        Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
        Route::post('update_profile', [AuthController::class, 'update_profile']);
        Route::post('me', [AuthController::class, 'me'])->name('api.me');
        Route::post('change/password', [AuthController::class, 'change_password'])->name('api.change_password');

    });
});

