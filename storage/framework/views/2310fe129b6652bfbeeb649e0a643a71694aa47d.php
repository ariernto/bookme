

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center bravo-login-form-page bravo-login-page">
        <div class="col-md-5">
            <?php echo $__env->make('Layout::admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="">
                <h4 class="form-title"><?php echo e(__('Login')); ?></h4>
                <?php echo $__env->make('auth.login-form',['captcha_action'=>'login_normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/resources/views/auth/login.blade.php ENDPATH**/ ?>