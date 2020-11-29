<div class="container">
    <div class="bravo-list-event layout_<?php echo e($style_list); ?>">
        <?php if($title): ?>
        <div class="title">
            <?php echo e($title); ?>
        </div>
        <?php endif; ?>
        <?php if($desc): ?>
            <div class="sub-title">
                <?php echo e($desc); ?>
            </div>
        <?php endif; ?>
        <div class="list-item">
            <?php if($style_list === "normal"): ?>
                <div class="row">
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-<?php echo e($col ?? 3); ?> col-md-6">
                            <?php echo $__env->make('Event::frontend.layouts.search.loop-gird', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Work\laravel\modules/Event/Views/frontend/blocks/list-event/index.blade.php ENDPATH**/ ?>