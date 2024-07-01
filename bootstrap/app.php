<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . "/../routes/web.php",
        api: __DIR__ . "/../routes/api.php",
        commands: __DIR__ . "/../routes/console.php",
        health: "/up",
        then: function () {
            Route::middleware("api")
                ->prefix("admin")
                ->name("admins.")
                ->group(base_path("routes/admin.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware
            // ->append([
            //     \Illuminate\Routing\Middleware\ThrottleRequests::class .
            //     ":global"
            // ])
            ->api(
                prepend: [
                    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class
                ]
            )
            ->alias([
                "verified" => \App\Http\Middleware\EnsureEmailIsVerified::class,
                "is_admin" => \App\Http\Middleware\EnsureUserIsAdmin::class,
                "is_customer" =>
                    \App\Http\Middleware\EnsureUserIsCustomer::class
            ])
            ->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();