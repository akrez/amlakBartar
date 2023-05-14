    
    <?php $__env->startSection('title'); ?> <?php echo e('املاک برتر'); ?> <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

    <div style="display:flex; justify-content:center;">
        <div class="col-xs-6 col-sm-3"
            style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">

            <?php echo $__env->make('users.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('users.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <p style="text-align:center;">کلمه عبور را وارد کنید</p><br>

            <form action="<?php echo e('password'); ?>" method="POST">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="کلمه عبور">
                </div>


                <div class="form-group">
                    <input type="submit" value="تایید" class="btn btn-primary  form-control">
                </div>
            </form>

        </div>
    </div><br />
    <section style="display:flex; justify-content:center;">

        <button class="btn btn-warning col-xs-3 col-sm-2" style="text-align:center"
            onclick="location.href='<?php echo e('recoverypass'); ?>'; "> کلمه عبور را فراموش کرده ام</button>

    </section>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/password.blade.php ENDPATH**/ ?>