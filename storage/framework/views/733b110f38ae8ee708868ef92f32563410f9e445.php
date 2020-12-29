<?php if(!empty($list_term)): ?>
    <div class="bravo-car-term-featured-box">
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
                    $page_search = Modules\Car\Models\Car::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    ?>
                    <div class="col-md-6 col-md-4 col-lg-3">
                        <a href="<?php echo e($page_search); ?>">
                            <div class="featured-item">
                                <div class="image">
                                    <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($item->name); ?>">
                                </div>
                                <h4 class="text">
                                    <?php echo e($item->name); ?>

                                </h4>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Car/Views/frontend/blocks/term-featured-box/index.blade.php ENDPATH**/ ?>