<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'actions' => [],
    'color' => 'gray',
    'icon' => null,
    'tooltip' => null,
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
    'actions' => [],
    'color' => 'gray',
    'icon' => null,
    'tooltip' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div
    <?php echo e($attributes->class([
            'fi-fo-field-wrp-hint flex items-center gap-x-3 text-sm',
        ])); ?>

>
    <!--[if BLOCK]><![endif]--><?php if(! \Filament\Support\is_slot_empty($slot)): ?>
        <span
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'fi-fo-field-wrp-hint-label',
                match ($color) {
                    'gray' => 'text-gray-500',
                    default => 'fi-color-custom text-custom-600 dark:text-custom-400',
                },
                is_string($color) ? "fi-color-{$color}" : null,
            ]); ?>"
            style="<?php echo \Illuminate\Support\Arr::toCssStyles([
                \Filament\Support\get_color_css_variables(
                    $color,
                    shades: [400, 600],
                    alias: 'forms::components.field-wrapper.hint.label',
                ),
            ]) ?>"
        >
            <?php echo e($slot); ?>

        </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($icon): ?>
        <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['xData' => '{}','icon' => $icon,'xTooltip' => filled($tooltip) ? '{ content: ' . \Illuminate\Support\Js::from($tooltip) . ', theme: $store.theme }' : null,'class' => \Illuminate\Support\Arr::toCssClasses([
                'fi-fo-field-wrp-hint-icon h-5 w-5',
                match ($color) {
                    'gray' => 'text-gray-400 dark:text-gray-500',
                    default => 'text-custom-500 dark:text-custom-400',
                },
            ]),'style' => \Illuminate\Support\Arr::toCssStyles([
                \Filament\Support\get_color_css_variables(
                    $color,
                    shades: [400, 500],
                    alias: 'forms::components.field-wrapper.hint.icon',
                ),
            ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-data' => '{}','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'x-tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(filled($tooltip) ? '{ content: ' . \Illuminate\Support\Js::from($tooltip) . ', theme: $store.theme }' : null),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
                'fi-fo-field-wrp-hint-icon h-5 w-5',
                match ($color) {
                    'gray' => 'text-gray-400 dark:text-gray-500',
                    default => 'text-custom-500 dark:text-custom-400',
                },
            ])),'style' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssStyles([
                \Filament\Support\get_color_css_variables(
                    $color,
                    shades: [400, 500],
                    alias: 'forms::components.field-wrapper.hint.icon',
                ),
            ]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if(count($actions)): ?>
        <div class="fi-fo-field-wrp-hint-action flex items-center gap-3">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($action); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/filament/forms/src/../resources/views/components/field-wrapper/hint.blade.php ENDPATH**/ ?>