<?php if($list_item): ?>
    <div class="bravo-how-it-works" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e(get_file_url($background_image ?? "","full")); ?>') !important">
        <div class="container">
            <div class="title">
                <?php echo e($title); ?>

            </div>
            <div class="row">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="col-md-4">
                        <div class="featured-item">
                            <div class="image">
                                <?php if(!empty($style) and $style == 'style2'): ?>
                                    <span class="number-circle"><?php echo e($k+1); ?></span>
                                <?php else: ?>
                                    <img src="<?php echo e($image_url); ?>" class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <h4 class="sub-title">
                                    <?php echo e($item['title']); ?>

                                </h4>
                                <div class="desc"><?php echo clean($item['sub_title']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/Template/Views/frontend/blocks/how-it-work/index.blade.php ENDPATH**/ ?>