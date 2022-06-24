<?php $__env->startComponent('mail::message'); ?>
# Hello

The body of your message.

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/jovickxe/medtimes.co/resources/views/email/test_mail.blade.php ENDPATH**/ ?>