
<?php $__env->startSection('title'); ?> <?php echo e('404 error'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div style="text-align:center">
    <h1>Error 404</h1><br>
    <h4><?php echo e('The page not found'); ?></h4>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/errors/404.blade.php ENDPATH**/ ?>