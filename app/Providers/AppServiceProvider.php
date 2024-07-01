<?php

namespace App\Providers;

use App\Models\Order;
use App\Policies\OrderPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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

    public function customizeMails(): void
    {
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

        ResetPassword::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage())
                ->subject("Restablecer contraseña")
                ->line(
                    "Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta"
                )
                ->action("Restablecer contraseña", $url)
                ->line("Este enlace caducará en 60 minutos.")
                ->line(
                    "Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción"
                )
                ->salutation("");
        });
    }

    public function createUrlToResetPassword(): void
    {
        ResetPassword::createUrlUsing(function (
            object $notifiable,
            string $token
        ) {
            return config("app.frontend_url") .
                "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }

    public function setUpPolicies(): void
    {
        Gate::policy(Order::class, OrderPolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->createUrlToResetPassword();
        $this->customizeMails();
        $this->setUpPolicies();
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
