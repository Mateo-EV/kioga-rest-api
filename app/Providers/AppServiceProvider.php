<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (
            object $notifiable,
            string $token
        ) {
            return config("app.frontend_url") .
                "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage())
                ->subject("Verificación de correo electrónico")
                ->line(
                    "Presiona el botón de abajo para verificar tu correo electrónico"
                )
                ->action("Verificar email", $url)
                ->line(
                    "Si no creó una cuenta, no es necesario realizar niguna otra acción"
                )
                ->salutation("");
        });

        // $this->createRateLimiters();

        if ($this->app->environment("local")) {
            DB::listen(function ($query) {
                Log::info(
                    $query->sql,
                    debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10)
                );
            });
        }
    }

    private function createRateLimiters()
    {
        RateLimiter::for("global", function (Request $request) {
            return Limit::perMinute(40)->by(
                $request->user()?->id ?: $request->ip()
            );
        });

        RateLimiter::for("admin", function (Request $request) {
            return Limit::perMinute(1000);
        });
    }
}