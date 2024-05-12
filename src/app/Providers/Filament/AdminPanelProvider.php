<?php

namespace App\Providers\Filament;

use Amendozaaguiar\FilamentRouteStatistics\FilamentRouteStatisticsPlugin;
use App\Filament\Pages\Admin\EditTeamProfile;
use App\Filament\Pages\Admin\RegisterTeam;
use App\Filament\Pages\Auth\Login;
use App\Filament\Widgets\FilamentCookieConsentInfoWidget;
use App\Filament\Widgets\FilamentEmailInfoWidget;
use App\Filament\Widgets\ResetAlertWidget;
use App\Models\Team;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use MarcoGermani87\FilamentCookieConsent\FilamentCookieConsent;
use RickDBCN\FilamentEmail\FilamentEmail;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->tenant(Team::class)
            ->tenantRegistration(RegisterTeam::class)
            ->tenantProfile(EditTeamProfile::class)
            ->login(Login::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                ResetAlertWidget::class,
                Widgets\FilamentInfoWidget::class,
                FilamentEmailInfoWidget::class,
                FilamentCookieConsentInfoWidget::class,
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
            ->plugins([
                FilamentEmail::make(),
                FilamentRouteStatisticsPlugin::make(),
                FilamentCookieConsent::make(),
            ]);
    }
}
