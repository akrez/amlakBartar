
<?php $__env->startSection('title'); ?> <?php echo e('املاک برتر'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div style="display:flex; justify-content:center;">
    <div class="form col-xs-8 col-sm-3" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">
        <?php echo $__env->make('users.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <h5>
            <p style="text-align:center;">برای بازیابی کلمه عبور نام خود را وارد کنید</p>
        </h5><br>

        <form action="<?php echo e('recovery'); ?>" method="POST">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="نام خود را وارد کنید" name="name">
            </div>

            <div class="form-group" style="text-align:center;">
                <button type="submit" name="submit" class="btn btn-success">تایید</button>

            </div>

        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/recoverypass.blade.php ENDPATH**/ ?>