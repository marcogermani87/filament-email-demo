<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('filament-email-demo.filament_shield_enabled')) {
            Gate::before(function ($user, $ability) {
                return $user->hasRole('super_admin') ? true : null;
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('filament-email-demo.force_https')) {
            $this->app['request']->server->set('HTTPS', 'on');
            URL::forceScheme('https');
        }
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'it', 'nl', 'de', 'pt', 'tr']);
        });
    }
}
