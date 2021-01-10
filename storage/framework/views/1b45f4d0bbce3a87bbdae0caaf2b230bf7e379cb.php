<div class="bravo-form-search-hotel" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e($bg_image_url); ?>') !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading"><?php echo e($title); ?></h1>
                <div class="sub-heading"><?php echo e($sub_title); ?></div>
                <div class="g-form-control">
                    <?php echo $__env->make('Hotel::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Hotel/Views/frontend/blocks/form-search-hotel/index.blade.php ENDPATH**/ ?>