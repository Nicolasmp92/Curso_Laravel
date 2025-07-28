<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    // Aquí puedes registrar middlewares si lo necesitas
    $middleware->alias([
        'checkrole' => App\Http\Middleware\RolMiddleware::class,
    ]);
    })
    ->create();
