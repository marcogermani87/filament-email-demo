<?php
    use Filament\Support\Facades\FilamentView;

    $color = $getColor() ?? 'primary';
    $hasInlineLabel = $hasInlineLabel();
    $id = $getId();
    $isDisabled = $isDisabled();
    $isPrefixInline = $isPrefixInline();
    $isReorderable = $isReorderable();
    $isSuffixInline = $isSuffixInline();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $statePath = $getStatePath();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
?>

<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field,'has-inline-label' => $hasInlineLabel]); ?>
     <?php $__env->slot('label', null, ['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
            'sm:pt-1.5' => $hasInlineLabel,
        ]))]); ?> 
        <?php echo e($getLabel()); ?>

     <?php $__env->endSlot(); ?>

    <?php if (isset($component)) { $__componentOriginal505efd9768415fdb4543e8c564dad437 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal505efd9768415fdb4543e8c564dad437 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.input.wrapper','data' => ['disabled' => $isDisabled,'inlinePrefix' => $isPrefixInline,'inlineSuffix' => $isSuffixInline,'prefix' => $prefixLabel,'prefixActions' => $prefixActions,'prefixIcon' => $prefixIcon,'prefixIconColor' => $getPrefixIconColor(),'suffix' => $suffixLabel,'suffixActions' => $suffixActions,'suffixIcon' => $suffixIcon,'suffixIconColor' => $getSuffixIconColor(),'valid' => ! $errors->has($statePath),'attributes' => 
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-fo-tags-input'])
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::input.wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isDisabled),'inline-prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isPrefixInline),'inline-suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isSuffixInline),'prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixLabel),'prefix-actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixActions),'prefix-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixIcon),'prefix-icon-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getPrefixIconColor()),'suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixLabel),'suffix-actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixActions),'suffix-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixIcon),'suffix-icon-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSuffixIconColor()),'valid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(! $errors->has($statePath)),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-fo-tags-input'])
        )]); ?>
        <div
            <?php if(FilamentView::hasSpaMode()): ?>
                ax-load="visible"
            <?php else: ?>
                ax-load
            <?php endif; ?>
            ax-load-src="<?php echo e(\Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('tags-input', 'filament/forms')); ?>"
            x-data="tagsInputFormComponent({
                        state: $wire.<?php echo e($applyStateBindingModifiers("\$entangle('{$statePath}')")); ?>,
                        splitKeys: <?php echo \Illuminate\Support\Js::from($getSplitKeys())->toHtml() ?>,
                    })"
            x-ignore
            <?php echo e($getExtraAlpineAttributeBag()); ?>

        >
            <?php if (isset($component)) { $__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.input.index','data' => ['autocomplete' => 'off','autofocus' => $isAutofocused(),'disabled' => $isDisabled,'id' => $id,'inlinePrefix' => $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),'inlineSuffix' => $isSuffixInline && (count($suffixActions) || $suffixIcon || filled($suffixLabel)),'list' => $id . '-suggestions','placeholder' => $getPlaceholder(),'type' => 'text','xBind' => 'input','attributes' => \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','autofocus' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isAutofocused()),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isDisabled),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'inline-prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel))),'inline-suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isSuffixInline && (count($suffixActions) || $suffixIcon || filled($suffixLabel))),'list' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id . '-suggestions'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getPlaceholder()),'type' => 'text','x-bind' => 'input','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag()))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e)): ?>
<?php $attributes = $__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e; ?>
<?php unset($__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e)): ?>
<?php $component = $__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e; ?>
<?php unset($__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e); ?>
<?php endif; ?>

            <datalist id="<?php echo e($id); ?>-suggestions">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $getSuggestions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <template
                        x-bind:key="<?php echo \Illuminate\Support\Js::from($suggestion)->toHtml() ?>"
                        x-if="! (state?.includes(<?php echo \Illuminate\Support\Js::from($suggestion)->toHtml() ?>) ?? true)"
                    >
                        <option value="<?php echo e($suggestion); ?>" />
                    </template>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </datalist>

            <div
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    '[&_.fi-badge-delete-button]:hidden' => $isDisabled,
                ]); ?>"
            >
                <div wire:ignore>
                    <template x-cloak x-if="state?.length">
                        <div
                            <?php if($isReorderable): ?>
                                x-on:end.stop="reorderTags($event)"
                                x-sortable
                                data-sortable-animation-duration="<?php echo e($getReorderAnimationDuration()); ?>"
                            <?php endif; ?>
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'flex w-full flex-wrap gap-1.5 p-2',
                                'border-t border-t-gray-200 dark:border-t-white/10',
                            ]); ?>"
                        >
                            <template
                                x-for="(tag, index) in state"
                                x-bind:key="`${tag}-${index}`"
                                class="hidden"
                            >
                                <?php if (isset($component)) { $__componentOriginal986dce9114ddce94a270ab00ce6c273d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal986dce9114ddce94a270ab00ce6c273d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.badge','data' => ['color' => $color,'xBind:xSortableItem' => $isReorderable ? 'index' : null,'xSortableHandle' => $isReorderable ? '' : null,'class' => \Illuminate\Support\Arr::toCssClasses([
                                        'cursor-move' => $isReorderable,
                                    ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($color),'x-bind:x-sortable-item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReorderable ? 'index' : null),'x-sortable-handle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReorderable ? '' : null),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
                                        'cursor-move' => $isReorderable,
                                    ]))]); ?>
                                    <?php echo e($getTagPrefix()); ?>


                                    <span
                                        x-text="tag"
                                        class="select-none text-start"
                                    ></span>

                                    <?php echo e($getTagSuffix()); ?>


                                     <?php $__env->slot('deleteButton', null, ['x-on:click' => 'deleteTag(tag)']); ?>  <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal986dce9114ddce94a270ab00ce6c273d)): ?>
<?php $attributes = $__attributesOriginal986dce9114ddce94a270ab00ce6c273d; ?>
<?php unset($__attributesOriginal986dce9114ddce94a270ab00ce6c273d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal986dce9114ddce94a270ab00ce6c273d)): ?>
<?php $component = $__componentOriginal986dce9114ddce94a270ab00ce6c273d; ?>
<?php unset($__componentOriginal986dce9114ddce94a270ab00ce6c273d); ?>
<?php endif; ?>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $attributes = $__attributesOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__attributesOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $component = $__componentOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__componentOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/filament/forms/src/../resources/views/components/tags-input.blade.php ENDPATH**/ ?>