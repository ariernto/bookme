<div class="user-content-header d-flex align-items-center py-3 border-bottom">
    <button type="button" class="btn btn-sm btn-toggle-sidebar-menu">
        <i class="icon ion-ios-menu"></i>
    </button>
    <?php if(!empty($breadcrumbs)): ?>
    <div class="breadcrumb-page-bar" aria-label="breadcrumb">
        <ul class="page-breadcrumb">
            <li class="">
                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a>
                <i class="fa fa-angle-right"></i>
            </li>
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class=" <?php echo e($breadcrumb['class'] ?? ''); ?>">
                    <?php if(!empty($breadcrumb['url'])): ?>
                        <a href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['name']); ?></a>
                        <i class="fa fa-angle-right"></i>
                    <?php else: ?>
                        <?php echo e($breadcrumb['name']); ?>

                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="bravo-more-menu-user">
            <i class="icofont-settings"></i>
        </div>
    </div>
    <?php endif; ?>
    <div class="ml-auto">
        <ul class="topbar-items">
            <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>
        <form id="content-logout-form-vendor" action="<?php echo e(route('auth.logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
        <a class="btn" href="#" onclick="event.preventDefault(); document.getElementById('content-logout-form-vendor').submit();"><i class="fa fa-lock"></i> <?php echo e(__("Log Out")); ?>

        </a>
    </div>
</div>
<?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Layout/parts/user-content-header.blade.php ENDPATH**/ ?>