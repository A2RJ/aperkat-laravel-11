<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('callback', 'callback');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home')->withoutMiddleware('auth');
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });

    Route::resource('user', UserController::class)->except(['create', 'store', 'edit', 'update']);
    Route::resource('role', RoleController::class)->except(['create',  'edit',]);
});
