<div>
    <?php $attachments = $getRecord()->attachments; ?>
    <!--[if BLOCK]><![endif]--><?php if(!empty($attachments)): ?>
        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="pb-4 pt-4 sm:pb-4">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <strong><?php echo e($attachment['name']); ?></strong>
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo e(($this->downloadAction)(['path' => $attachment['path'], 'name' => $attachment['name'] , 'type' => $attachment['contentType']])); ?>

                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </ul>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /home/marco/projects/private/filament-email-demo/vendor/rickdbcn/filament-email/src/../resources/views/attachments.blade.php ENDPATH**/ ?>