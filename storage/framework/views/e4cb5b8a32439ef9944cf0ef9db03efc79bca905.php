

<?php $__env->startSection('content'); ?>
<div class="page-profile-content page-template-content">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <?php echo $__env->make('User::frontend.profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-9">
                    <h3 class="profile-name"><?php echo e(__("Hi, I'm :name",['name'=>$user->getDisplayName()])); ?></h3>
                    <div class="profile-bio"><?php echo $user->bio; ?></div>
                    <?php echo $__env->make('User::frontend.profile.services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="div" style="margin-top: 40px;">
                        <?php echo $__env->make('User::frontend.profile.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Web\Laravel\newpro\package\modules/User/Views/frontend/profile/profile.blade.php ENDPATH**/ ?>