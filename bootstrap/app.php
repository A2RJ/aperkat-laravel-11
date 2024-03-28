<?php

use App\Http\Middleware\Auth\AdminLpj;
use App\Http\Middleware\Auth\AdminPencairan;
use App\Http\Middleware\Auth\DirKeuangan;
use App\Http\Middleware\Auth\SuperAdmin;
use App\Http\Middleware\Auth\User;
use App\Http\Middleware\Auth\Wr2;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin-lpj' => AdminLpj::class,
        'admin-pencairan' => AdminPencairan::class,
        'dir-keuangan' => DirKeuangan::class,
        'super-admin' => SuperAdmin::class,
        'user' => User::class,
        'wr2' => Wr2::class
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
