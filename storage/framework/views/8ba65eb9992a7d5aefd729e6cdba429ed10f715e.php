<?php echo $__env->make('website.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('website.partials._nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('web-content'); ?>

<?php echo $__env->make('website.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('website.partials._leg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/website/website-master.blade.php ENDPATH**/ ?>