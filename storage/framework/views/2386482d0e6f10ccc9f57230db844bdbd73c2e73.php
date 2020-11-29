<?php if(!empty($list_item)): ?>
    <div class="bravo-offer">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $size = 3 ; if($key == 0) $size = 6; ?>
                    <div class="col-lg-<?php echo e($size); ?>">
                        <div class="item">
                            <?php if(!empty($item['featured_text'])): ?>
                                <div class="featured-text"><?php echo e($item['featured_text']); ?></div>
                            <?php endif; ?>
                            <?php if(!empty($item['featured_icon'])): ?>
                                <div class="featured-icon"><i class="<?php echo e($item['featured_icon']); ?>"></i></div>
                            <?php endif; ?>
                            <h2 class="item-title"><?php echo e($item['title']); ?></h2>
                            <p class="item-sub-title"><?php echo $item['desc']; ?></p>
                            <a href="<?php echo e($item['link_more']); ?>" class="btn btn-default"><?php echo e($item['link_title']); ?></a>
                            <div class="img-cover" style="background: url('<?php echo e(get_file_url($item['background_image'],'full') ?? ""); ?>')"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Template/Views/frontend/blocks/offer-block/index.blade.php ENDPATH**/ ?>