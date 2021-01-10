<div class="bravo-form-search-space" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e($bg_image_url); ?>') !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading text-center"><?php echo e($title); ?></h1>
                <h2 class="sub-heading text-center"><?php echo e($sub_title); ?></h2>
                <div class="g-form-control">
                    <?php echo $__env->make('Space::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Space/Views/frontend/blocks/form-search-space/index.blade.php ENDPATH**/ ?>