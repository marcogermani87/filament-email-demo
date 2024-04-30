<?php if (isset($component)) { $__componentOriginal22ab0dbc2c6619d5954111bba06f01db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22ab0dbc2c6619d5954111bba06f01db = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.dropdown.index','data' => ['teleport' => true,'placement' => $placement,'width' => $isFlagsOnly ? 'flags-only' : 'fls-dropdown-width','class' => 'fi-dropdown fi-user-menu']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['teleport' => true,'placement' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($placement),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isFlagsOnly ? 'flags-only' : 'fls-dropdown-width'),'class' => 'fi-dropdown fi-user-menu']); ?>
     <?php $__env->slot('trigger', null, []); ?> 
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center justify-center w-9 h-9 language-switch-trigger text-primary-600 bg-primary-500/10',
                'rounded-full' => $isCircular,
                'rounded-lg' => !$isCircular,
                'p-1 ring-2 ring-inset ring-gray-200 hover:ring-gray-300 dark:ring-gray-500 hover:dark:ring-gray-400' => $isFlagsOnly || $hasFlags,
            ]); ?>"
            x-tooltip="{
                content: <?php echo \Illuminate\Support\Js::from($languageSwitch->getLabel(app()->getLocale()))->toHtml() ?>,
                theme: $store.theme,
                placement: 'bottom'
            }"
        >
            <!--[if BLOCK]><![endif]--><?php if($isFlagsOnly || $hasFlags): ?>
                <?php if (isset($component)) { $__componentOriginal60e217af823498e4168aca8ae5c3e23e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60e217af823498e4168aca8ae5c3e23e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-language-switch::components.flag','data' => ['src' => $languageSwitch->getFlag(app()->getLocale()),'circular' => $isCircular,'alt' => $languageSwitch->getLabel(app()->getLocale()),'switch' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-language-switch::flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getFlag(app()->getLocale())),'circular' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isCircular),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getLabel(app()->getLocale())),'switch' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $attributes = $__attributesOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $component = $__componentOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__componentOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
            <?php else: ?>
                <span class="font-semibold text-md"><?php echo e($languageSwitch->getCharAvatar(app()->getLocale())); ?></span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
     <?php $__env->endSlot(); ?>

    <?php if (isset($component)) { $__componentOriginal66687bf0670b9e16f61e667468dc8983 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal66687bf0670b9e16f61e667468dc8983 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.dropdown.list.index','data' => ['class' => \Illuminate\Support\Arr::toCssClasses(['!border-t-0 space-y-1 !p-2.5'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::dropdown.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['!border-t-0 space-y-1 !p-2.5']))]); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if(!app()->isLocale($locale)): ?>
                <button
                    type="button"
                    wire:click="changeLocale('<?php echo e($locale); ?>')"
                    <?php if($isFlagsOnly): ?>
                    x-tooltip="{
                        content: <?php echo \Illuminate\Support\Js::from($languageSwitch->getLabel($locale))->toHtml() ?>,
                        theme: $store.theme,
                        placement: 'right'
                    }"
                    <?php endif; ?>

                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'flex items-center w-full transition-colors duration-75 rounded-md outline-none fi-dropdown-list-item whitespace-nowrap disabled:pointer-events-none disabled:opacity-70 fi-dropdown-list-item-color-gray hover:bg-gray-950/5 focus:bg-gray-950/5 dark:hover:bg-white/5 dark:focus:bg-white/5',
                        'justify-center px-2 py-0.5' => $isFlagsOnly,
                        'justify-start space-x-2 rtl:space-x-reverse p-1' => !$isFlagsOnly,
                    ]); ?>"
                >

                    <!--[if BLOCK]><![endif]--><?php if($isFlagsOnly): ?>
                        <?php if (isset($component)) { $__componentOriginal60e217af823498e4168aca8ae5c3e23e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60e217af823498e4168aca8ae5c3e23e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-language-switch::components.flag','data' => ['src' => $languageSwitch->getFlag($locale),'circular' => $isCircular,'alt' => $languageSwitch->getLabel($locale),'class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-language-switch::flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getFlag($locale)),'circular' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isCircular),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getLabel($locale)),'class' => 'w-7 h-7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $attributes = $__attributesOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $component = $__componentOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__componentOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
                    <?php else: ?>
                        <!--[if BLOCK]><![endif]--><?php if($hasFlags): ?>
                            <?php if (isset($component)) { $__componentOriginal60e217af823498e4168aca8ae5c3e23e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60e217af823498e4168aca8ae5c3e23e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-language-switch::components.flag','data' => ['src' => $languageSwitch->getFlag($locale),'circular' => $isCircular,'alt' => $languageSwitch->getLabel($locale),'class' => 'w-7 h-7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-language-switch::flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getFlag($locale)),'circular' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isCircular),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($languageSwitch->getLabel($locale)),'class' => 'w-7 h-7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $attributes = $__attributesOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__attributesOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60e217af823498e4168aca8ae5c3e23e)): ?>
<?php $component = $__componentOriginal60e217af823498e4168aca8ae5c3e23e; ?>
<?php unset($__componentOriginal60e217af823498e4168aca8ae5c3e23e); ?>
<?php endif; ?>
                        <?php else: ?>
                            <span
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'flex items-center justify-center flex-shrink-0 w-7 h-7 p-2 text-xs font-semibold group-hover:bg-white group-hover:text-primary-600 group-hover:border group-hover:border-primary-500/10 group-focus:text-white bg-primary-500/10 text-primary-600',
                                    'rounded-full' => $isCircular,
                                    'rounded-lg' => !$isCircular,
                                ]); ?>"
                            >
                                <?php echo e($languageSwitch->getCharAvatar($locale)); ?>

                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <span class="text-sm font-medium text-gray-600 hover:bg-transparent dark:text-gray-200">
                            <?php echo e($languageSwitch->getLabel($locale)); ?>

                        </span>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal66687bf0670b9e16f61e667468dc8983)): ?>
<?php $attributes = $__attributesOriginal66687bf0670b9e16f61e667468dc8983; ?>
<?php unset($__attributesOriginal66687bf0670b9e16f61e667468dc8983); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal66687bf0670b9e16f61e667468dc8983)): ?>
<?php $component = $__componentOriginal66687bf0670b9e16f61e667468dc8983; ?>
<?php unset($__componentOriginal66687bf0670b9e16f61e667468dc8983); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22ab0dbc2c6619d5954111bba06f01db)): ?>
<?php $attributes = $__attributesOriginal22ab0dbc2c6619d5954111bba06f01db; ?>
<?php unset($__attributesOriginal22ab0dbc2c6619d5954111bba06f01db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22ab0dbc2c6619d5954111bba06f01db)): ?>
<?php $component = $__componentOriginal22ab0dbc2c6619d5954111bba06f01db; ?>
<?php unset($__componentOriginal22ab0dbc2c6619d5954111bba06f01db); ?>
<?php endif; ?><?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/bezhansalleh/filament-language-switch/src/../resources/views/switch.blade.php ENDPATH**/ ?>