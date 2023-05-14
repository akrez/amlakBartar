
<?php $__env->startSection('title'); ?> <?php echo e('املاک برتر'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div  style="display:flex; justify-content:center;">
        <div class="col-xs-6 col-sm-3" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">
            <h3><p style="text-align:center;"><?php echo e($name); ?> به املاک برتر خوش آمدید </p></h3><br>
        </div>
    </div><br>
    <section style="display:flex; justify-content:center;">
            
            <button class="btn btn-warning col-xs-3 col-sm-2"  style="text-align:center" onclick="location.href='<?php echo e('/'); ?>'; ">خروج</button>
            
    </section>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/home.blade.php ENDPATH**/ ?>