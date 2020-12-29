<div class="container">
    <div class="bravo-list-locations <?php if(!empty($layout)): ?> <?php echo e($layout); ?> <?php endif; ?>">
        <div class="title">
            <?php echo e($title); ?>

        </div>
        <?php if(!empty($desc)): ?>
            <div class="sub-title">
                <?php echo e($desc); ?>

            </div>
        <?php endif; ?>
        <?php if(!empty($rows)): ?>
            <div class="list-item">
                <div class="row">
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $size_col = 4;
                        if( !empty($layout) and (  $layout == "style_2" or $layout == "style_3" or $layout == "style_4" )){
                            $size_col = 4;
                        }else{
                            if($key == 0){
                                $size_col = 8;
                            }
                        }
                        ?>
                        <div class="col-lg-<?php echo e($size_col); ?> col-md-6">
                            <?php echo $__env->make('Location::frontend.blocks.list-locations.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH D:\Web\Laravel\newpro\package\modules/Location/Views/frontend/blocks/list-locations/index.blade.php ENDPATH**/ ?>