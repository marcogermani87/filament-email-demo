<?php
    use Filament\Forms\Components\Tabs\Tab;

    $isContained = $isContained();
?>

<div
    wire:ignore.self
    x-cloak
    x-data="{
        tab: <?php if($isTabPersisted() && filled($persistenceId = $getId())): ?> $persist(null).as('tabs-<?php echo e($persistenceId); ?>') <?php else: ?> null <?php endif; ?>,

        getTabs: function () {
            if (! this.$refs.tabsData) {
                return []
            }

            return JSON.parse(this.$refs.tabsData.value)
        },

        updateQueryString: function () {
            if (! <?php echo \Illuminate\Support\Js::from($isTabPersistedInQueryString())->toHtml() ?>) {
                return
            }

            const url = new URL(window.location.href)
            url.searchParams.set(<?php echo \Illuminate\Support\Js::from($getTabQueryStringKey())->toHtml() ?>, this.tab)

            history.pushState(null, document.title, url.toString())
        },
    }"
    x-init="
        $watch('tab', () => updateQueryString())

        const tabs = getTabs()

        if (! tab || ! tabs.includes(tab)) {
            tab = tabs[<?php echo \Illuminate\Support\Js::from($getActiveTab())->toHtml() ?> - 1]
        }

        Livewire.hook('commit', ({ component, commit, succeed, fail, respond }) => {
            succeed(({ snapshot, effect }) => {
                $nextTick(() => {
                    if (component.id !== <?php echo \Illuminate\Support\Js::from($this->getId())->toHtml() ?>) {
                        return
                    }

                    const tabs = getTabs()

                    if (! tabs.includes(tab)) {
                        tab = tabs[<?php echo \Illuminate\Support\Js::from($getActiveTab())->toHtml() ?> - 1] ?? tab
                    }
                })
            })
        })
    "
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
                'wire:key' => "{$this->getId()}.{$getStatePath()}." . \Filament\Forms\Components\Tabs::class . '.container',
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->merge($getExtraAlpineAttributes(), escape: false)
            ->class([
                'fi-fo-tabs flex flex-col',
                'fi-contained rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10' => $isContained,
            ])); ?>

>
    <input
        type="hidden"
        value="<?php echo e(collect($getChildComponentContainer()->getComponents())
                ->filter(static fn (Tab $tab): bool => $tab->isVisible())
                ->map(static fn (Tab $tab) => $tab->getId())
                ->values()
                ->toJson()); ?>"
        x-ref="tabsData"
    />

    <?php if (isset($component)) { $__componentOriginal447636fe67a19f9c79619fb5a3c0c28d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal447636fe67a19f9c79619fb5a3c0c28d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.tabs.index','data' => ['contained' => $isContained,'label' => $getLabel()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['contained' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isContained),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getLabel())]); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $tabId = $tab->getId();
            ?>

            <?php if (isset($component)) { $__componentOriginal35d4caf141547fb7d125e4ebd3c1b66f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35d4caf141547fb7d125e4ebd3c1b66f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.tabs.item','data' => ['alpineActive' => 'tab === \'' . $tabId . '\'','badge' => $tab->getBadge(),'badgeColor' => $tab->getBadgeColor(),'icon' => $tab->getIcon(),'iconPosition' => $tab->getIconPosition(),'xOn:click' => 'tab = \'' . $tabId . '\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['alpine-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('tab === \'' . $tabId . '\''),'badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab->getBadge()),'badge-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab->getBadgeColor()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab->getIcon()),'icon-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tab->getIconPosition()),'x-on:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('tab = \'' . $tabId . '\'')]); ?>
                <?php echo e($tab->getLabel()); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35d4caf141547fb7d125e4ebd3c1b66f)): ?>
<?php $attributes = $__attributesOriginal35d4caf141547fb7d125e4ebd3c1b66f; ?>
<?php unset($__attributesOriginal35d4caf141547fb7d125e4ebd3c1b66f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35d4caf141547fb7d125e4ebd3c1b66f)): ?>
<?php $component = $__componentOriginal35d4caf141547fb7d125e4ebd3c1b66f; ?>
<?php unset($__componentOriginal35d4caf141547fb7d125e4ebd3c1b66f); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal447636fe67a19f9c79619fb5a3c0c28d)): ?>
<?php $attributes = $__attributesOriginal447636fe67a19f9c79619fb5a3c0c28d; ?>
<?php unset($__attributesOriginal447636fe67a19f9c79619fb5a3c0c28d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal447636fe67a19f9c79619fb5a3c0c28d)): ?>
<?php $component = $__componentOriginal447636fe67a19f9c79619fb5a3c0c28d; ?>
<?php unset($__componentOriginal447636fe67a19f9c79619fb5a3c0c28d); ?>
<?php endif; ?>

    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($tab); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/filament/forms/src/../resources/views/components/tabs.blade.php ENDPATH**/ ?>