
<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Change Password")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route("user.change_password.update")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel p-4 shadow-sm mb-5">
                    <div class="form-group">
                        <label><?php echo e(__("Current Password")); ?></label>
                        <input type="password" name="current-password" placeholder="<?php echo e(__("Current Password")); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("New Password")); ?></label>
                        <input type="password" name="new-password" placeholder="<?php echo e(__("New Password")); ?>" class="form-control">
                                       </div>
                    <div class="form-group">
                        <label><?php echo e(__("New Password Again")); ?></label>
                        <input type="password" name="new-password_confirmation" placeholder="<?php echo e(__("New Password Again")); ?>" class="form-control">
                    </div>
                    
                    <div class="d-flex mt-5">
                        <input type="submit" class="btn btn-danger" value="<?php echo e(__("Change Password")); ?>">
                        <a href="<?php echo e(route("user.profile.index")); ?>" class="btn btn-light border ml-auto"><?php echo e(__("Cancel")); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/User/Views/frontend/changePassword.blade.php ENDPATH**/ ?>