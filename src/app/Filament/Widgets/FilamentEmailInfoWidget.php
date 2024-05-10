<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FilamentEmailInfoWidget extends Widget
{
    protected static ?int $sort = 0;

    protected static bool $isLazy = false;

    /**
     * @var view-string
     */
    protected static string $view = 'widgets.filament-email-info-widget';
}
