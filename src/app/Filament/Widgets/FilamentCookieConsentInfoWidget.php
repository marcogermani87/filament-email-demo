<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FilamentCookieConsentInfoWidget extends Widget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    /**
     * @var view-string
     */
    protected static string $view = 'widgets.filament-cookie-consent-info-widget';
}
