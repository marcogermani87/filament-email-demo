<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'it', 'nl', 'de', 'pt', 'tr']);
        });
    }
}
