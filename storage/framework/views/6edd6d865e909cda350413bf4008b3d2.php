<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label' => null,
    'labelHidden' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'label' => null,
    'labelHidden' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<fieldset
    <?php echo e($attributes->class([
            'fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10',
        ])); ?>

>
    <!--[if BLOCK]><![endif]--><?php if(filled($label)): ?>
        <legend
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                '-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white',
                'sr-only' => $labelHidden,
            ]); ?>"
        >
            <?php echo e($label); ?>

        </legend>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php echo e($slot); ?>

</fieldset>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/filament/support/src/../resources/views/components/fieldset.blade.php ENDPATH**/ ?>