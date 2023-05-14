
<?php $__env->startSection('title'); ?> <?php echo e('املاک برتر'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div style="display:flex; justify-content:center;">
    <div class="col-xs-6 col-sm-3" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">
        <?php echo $__env->make('users.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <p style="text-align:center;">ایمیل خود را وارد کنید</p><br>

        <form action="<?php echo e('login'); ?>" method="POST">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="ایمیل">
            </div>

            <div class="form-group">
                <input type="submit" value="ورود" class="btn btn-primary  form-control">
            </div>
        </form>

    </div>
</div><br>

<section  style="display:flex; justify-content:center;">

    <button class="btn btn-warning col-xs-3 col-sm-2" style="text-align:center"
        onclick="location.href='<?php echo e('register'); ?>'; ">عضویت</button>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/loginview.blade.php ENDPATH**/ ?>