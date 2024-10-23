<?php

namespace App\Providers\Filament;

use Amendozaaguiar\FilamentRouteStatistics\FilamentRouteStatisticsPlugin;
use App\Filament\Pages\Admin\EditTeamProfile;
use App\Filament\Pages\Admin\RegisterTeam;
use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\FilamentCaptchaInfoWidget;
use App\Filament\Widgets\FilamentCookieConsentInfoWidget;
use App\Filament\Widgets\FilamentEmailInfoWidget;
use App\Filament\Widgets\ResetAlertWidget;
use App\Models\Team;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\App;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use MarcoGermani87\FilamentCaptcha\FilamentCaptcha;
use MarcoGermani87\FilamentCookieConsent\FilamentCookieConsent;
use MarcoGermani87\FilamentMatomo\FilamentMatomo;
use RickDBCN\FilamentEmail\FilamentEmail;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->spa(!App::hasDebugModeEnabled());

        if (config('filament-email-demo.tenant_enabled')) {
            $panel->tenant(Team::class)
                ->tenantRegistration(RegisterTeam::class)
                ->tenantProfile(EditTeamProfile::class);
        }

        return $panel
            ->login(Login::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                ResetAlertWidget::class,
                FilamentEmailInfoWidget::class,
                FilamentCookieConsentInfoWidget::class,
                FilamentCaptchaInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins($this->getPlugins());
    }

    private function getPlugins(): array
    {
        $plugins = [
            FilamentEmail::make(),
            FilamentRouteStatisticsPlugin::make(),
            FilamentCookieConsent::make(),
            FilamentMatomo::make(),
            FilamentCaptcha::make(),
        ];

        if (config('filament-email-demo.filament_shield_enabled')) {
            $plugins[] = FilamentShieldPlugin::make();
        }

        return $plugins;
    }
}
