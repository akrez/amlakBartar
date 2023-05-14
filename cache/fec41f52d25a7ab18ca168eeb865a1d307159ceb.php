    <?php if($errors): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="color:red">
                <?php echo e($error); ?>

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>


    <?php if($message): ?>
    <div class="alert alert-success">
        <?php echo e($message); ?>

    </div><br>
    <?php endif; ?><?php /**PATH C:\xampp\htdocs\AmlakBartar\resources\views/users/messages.blade.php ENDPATH**/ ?>