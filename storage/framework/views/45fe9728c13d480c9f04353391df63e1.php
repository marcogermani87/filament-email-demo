<?php
    $id = $getId();
    $isContained = $getContainer()->getParentComponent()->isContained();

    $activeTabClasses = \Illuminate\Support\Arr::toCssClasses([
        'fi-active',
        'p-6' => $isContained,
        'mt-6' => ! $isContained,
    ]);

    $inactiveTabClasses = 'invisible h-0 overflow-y-hidden p-0';
?>

<div
    x-bind:class="{
        <?php echo \Illuminate\Support\Js::from($activeTabClasses)->toHtml() ?>: tab === <?php echo \Illuminate\Support\Js::from($id)->toHtml() ?>,
        <?php echo \Illuminate\Support\Js::from($inactiveTabClasses)->toHtml() ?>: tab !== <?php echo \Illuminate\Support\Js::from($id)->toHtml() ?>,
    }"
    x-on:expand="tab = <?php echo \Illuminate\Support\Js::from($id)->toHtml() ?>"
    <?php echo e($attributes
            ->merge([
                'aria-labelledby' => $id,
                'id' => $id,
                'role' => 'tabpanel',
                'tabindex' => '0',
                'wire:key' => "{$this->getId()}.{$getStatePath()}." . \Filament\Forms\Components\Tab::class . ".tabs.{$id}",
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->class(['fi-fo-tabs-tab outline-none'])); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/filament/forms/src/../resources/views/components/tabs/tab.blade.php ENDPATH**/ ?>