<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login');
    Route::get('callback', 'callback');
});
