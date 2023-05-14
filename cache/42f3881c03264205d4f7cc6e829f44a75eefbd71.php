
<?php $__env->startSection('title'); ?> <?php echo e('املاک برتر'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div style="display:flex; justify-content:center;">
    <div class="form col-xs-8 col-sm-3" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">
        <?php echo $__env->make('users.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('users.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <h4>
            <p style="text-align:center;">تغییر کلمه عبور</p>
        </h4><br>

        <form action="<?php echo e('changepass'); ?>" method="POST">

            <div class="form-group">
                <input type="password" class="form-control" placeholder="کلمه عبور جدید" name="password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="تکرار کلمه عبور" name="password_again">
            </div>

            <div class="form-group" style="text-align:center;">
                <button type="submit" name="submit" class="btn btn-success">ثبت</button>

            </div>

        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/changepass.blade.php ENDPATH**/ ?>