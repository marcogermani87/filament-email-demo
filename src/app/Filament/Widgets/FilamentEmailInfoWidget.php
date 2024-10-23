<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FilamentEmailInfoWidget extends Widget
{
    protected static ?int $sort = 0;

    protected static bool $isLazy = false;

    protected int | string | array $columnSpan = [
        'default' => 'full',
        'sm' => 2,
        'md' => 2,
        'xl' => 1,
    ];

    protected static string $view = 'filament.widgets.filament-email-info-widget';
}
