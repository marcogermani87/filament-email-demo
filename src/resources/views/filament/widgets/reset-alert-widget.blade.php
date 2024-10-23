<x-filament-widgets::widget class="fi-reset-alert-widget">
    <x-filament::section @style('background-color: #FFF3CD;color: black; border: 1px solid black;')>
        <div class="flex">
            <div class="basis-1/4">
                <x-filament::icon
                    icon="heroicon-o-bell-alert"
                    class="h-7 w-7"
                />
            </div>
            <div class="basis-3/4">
                <h1 style="font-weight: bold; font-size: 23px; line-height: 26px; margin-left: 3px;">{{ __('messages.reset_alert_header') }}</h1>
            </div>
        </div>

        {{ __('messages.reset_alert_text') }}
    </x-filament::section>
</x-filament-widgets::widget>
