<?php if(!empty($list_term)): ?>
    <div class="bravo-featured-box">
        <div class="container">
            <div class="title">
                <?php echo e($title); ?>

            </div>
            <?php if($desc): ?>
                <div class="sub-title">
                    <?php echo e($desc); ?>

                </div>
            <?php endif; ?>
            <div class="row">
                <?php $__currentLoopData = $list_term; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $image_url = get_file_url($item->image_id, 'full');
                    $page_search = Modules\Space\Models\Space::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    ?>
                    <div class="col-md-6 col-md-4 col-lg-2 ">
                        <a href="<?php echo e($page_search); ?>">
                            <div class="featured-item">
                                <div class="image">
                                    <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($item->name); ?>">
                                </div>
                                <h3 class="text">
                                    <?php echo e($item->name); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Space/Views/frontend/blocks/term-featured-box/index.blade.php ENDPATH**/ ?>