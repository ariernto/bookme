<?php
//if(!setting_item('tour_enable_inbox')) return;
$vendor = $row->author;
?>
<div class="owner-info widget-box">
    <div class="media">
        <div class="media-left">
            <a href="<?php echo e(route('user.profile',['id'=>$vendor->id])); ?>" target="_blank" >
                <?php if($avatar_url = $vendor->getAvatarUrl()): ?>
                    <img class="avatar avatar-96 photo origin round" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($vendor->getDisplayName()); ?>">
                <?php else: ?>
                    <span class="avatar-text"><?php echo e(ucfirst($vendor->getDisplayName()[0])); ?></span>
                <?php endif; ?>
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a class="author-link" href="<?php echo e(route('user.profile',['id'=>$vendor->id])); ?>" target="_blank"><?php echo e($vendor->getDisplayName()); ?></a>
                <?php if($vendor->is_verified): ?>
                    <img data-toggle="tooltip" data-placement="top" src="<?php echo e(asset('icon/ico-vefified-1.svg')); ?>" title="<?php echo e(__("Verified")); ?>" alt="<?php echo e(__("Verified")); ?>">
                <?php else: ?>
                    <img data-toggle="tooltip" data-placement="top" src="<?php echo e(asset('icon/ico-not-vefified-1.svg')); ?>" title="<?php echo e(__("Not verified")); ?>" alt="<?php echo e(__("Verified")); ?>">
                <?php endif; ?>
            </h4>
            <p><?php echo e(__("Member Since :time",["time"=> date("M Y",strtotime($vendor->created_at))])); ?></p>
            <?php if((!Auth::id() or Auth::id() != $row->create_user ) and setting_item('inbox_enable')): ?>
                <span class="bc_start_chat btn" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><i class="icon ion-ios-chatboxes"></i> <?php echo e(__('Message host')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/layouts/details/vendor.blade.php ENDPATH**/ ?>