<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ResetAlertWidget extends Widget
{
    protected static ?int $sort = -2;

    protected static bool $isLazy = false;

    protected int | string | array $columnSpan = 2;

    /**
     * @var view-string
     */
    protected static string $view = 'widgets.reset-alert-widget';
}
