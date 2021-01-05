<?php
    if(!empty($translation->include)){
        $title = __("Included");
    }
    if(!empty($translation->exclude)){
        $title = __("Excluded");
    }
    if(!empty($translation->exclude) and !empty($translation->include)){
        $title = __("Included/Excluded");
    }
?>
<?php if(!empty($title)): ?>
    <div class="g-include-exclude">
        <h3> <?php echo e($title); ?> </h3>
        <div class="row">
            <?php if($translation->include): ?>
                <div class="col-lg-6 col-md-6">
                    <?php $__currentLoopData = $translation->include; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <i class="icofont-check-alt icon-include"></i>
                            <?php echo e($item['title']); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <?php if($translation->exclude): ?>
                <div class="col-lg-6 col-md-6">
                    <?php $__currentLoopData = $translation->exclude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <i class="icofont-close-line icon-exclude"></i>
                            <?php echo e($item['title']); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/Tour/Views/frontend/layouts/details/tour-include-exclude.blade.php ENDPATH**/ ?>