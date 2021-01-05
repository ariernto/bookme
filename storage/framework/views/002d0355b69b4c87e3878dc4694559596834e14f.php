<div class="profile-summary mb-2">
    <div class="profile-avatar">
        <?php if($avatar = $user->getAvatarUrl()): ?>
            <div class="avatar-img avatar-cover" style="background-image: url('<?php echo e($user->getAvatarUrl()); ?>')">
            </div>
        <?php else: ?>
            <span class="avatar-text"><?php echo e($user->getDisplayName()[0]); ?></span>
        <?php endif; ?>
    </div>
    <div class="text-center mb-1"><span class="role-name  badge badge-primary"><?php echo e($user->role_name); ?></span></div>
    <h3 class="display-name"><?php echo e($user->getDisplayName()); ?>

        <?php if($user->is_verified): ?>
            <img data-toggle="tooltip" data-placement="top" src="<?php echo e(asset('icon/ico-vefified-1.svg')); ?>" title="<?php echo e(__("Verified")); ?>" alt="ico-vefified-1">
        <?php else: ?>
            <img data-toggle="tooltip" data-placement="top" src="<?php echo e(asset('icon/ico-not-vefified-1.svg')); ?>" title="<?php echo e(__("Not verified")); ?>" alt="ico-vefified-1">
        <?php endif; ?>
    </h3>

    <p class="profile-since"><?php echo e(__("Member Since :time",["time"=> date("M Y",strtotime($user->created_at))])); ?></p>

    <?php if($user->hasPermissionTo('dashboard_vendor_access')): ?><hr>
    <ul class="meta-info style2">
        <li class="is_vendor">
            <i class="icon ion-ios-ribbon"></i>
            <?php echo e(__('Vendor')); ?>

        </li>
        <li class="review_count">
            <i class="icon ion-ios-thumbs-up"></i>
            <?php if($user->review_count <= 1): ?>
                <?php echo e(__(':count review',['count'=>$user->review_count])); ?>

            <?php else: ?>
                <?php echo e(__(':count reviews',['count'=>$user->review_count])); ?>

            <?php endif; ?>
        </li>
    </ul>
    <?php endif; ?>
    <?php if(setting_item('vendor_show_email') or setting_item('vendor_show_phone')): ?>
    <hr>
    <ul class="meta-info style1">
        <?php if(setting_item('vendor_show_email')): ?>
        <li class="user_email">
            <span class="label"><?php echo e(__('Email:')); ?></span>
            <span class="val"><?php echo e($user->email); ?></span>
        </li>
        <?php endif; ?>

        <?php if(setting_item('vendor_show_phone')): ?>
        <li class="user_phone">
            <span class="label"><?php echo e(__('Phone:')); ?></span>
            <span class="val"><?php echo e($user->phone); ?></span>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
    <?php if(empty(setting_item('user_disable_verification_feature'))): ?>
        <hr>
        <h4 class="summary-title"><?php echo e(__('Verifications')); ?></h4>
        <ul class="verification-lists">
            <?php if(!empty($user->verification_fields)): ?>
                <?php $__currentLoopData = $user->verification_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <span class="left-icon">
                         <?php if($field['is_verified']): ?>
                                <img src="<?php echo e(asset('icon/success.svg')); ?>" alt="success">
                            <?php else: ?>
                                <img src="<?php echo e(asset('icon/x.svg')); ?>" alt="success">
                            <?php endif; ?>
                        </span> <span><?php echo e($field['name']); ?></span>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</div>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/User/Views/frontend/profile/sidebar.blade.php ENDPATH**/ ?>