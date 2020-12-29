<?php if(count($space_related) > 0): ?>
    <div class="bravo-list-space-related">
        <h2><?php echo e(__("You might also like")); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $space_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <?php echo $__env->make('Space::frontend.layouts.search.loop-gird',['row'=>$item,'include_param'=>0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Space/Views/frontend/layouts/details/space-related.blade.php ENDPATH**/ ?>