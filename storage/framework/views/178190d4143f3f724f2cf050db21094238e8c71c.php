<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="item">
    <?php if($row->is_featured == "1"): ?>
        <div class="featured">
            <?php echo e(__("Featured")); ?>

        </div>
    <?php endif; ?>
    <div class="header-thumb">
        <?php if($row->discount_percent): ?>
            <div class="sale_info"><?php echo e($row->discount_percent); ?></div>
        <?php endif; ?>
        <?php if($row->image_url): ?>
            <?php if(!empty($disable_lazyload)): ?>
                <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="<?php echo e($location->name ?? ''); ?>">
            <?php else: ?>
                <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]); ?>

            <?php endif; ?>
        <?php endif; ?>
        <a class="st-btn st-btn-primary tour-book-now" href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e(__("Book now")); ?></a>
        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="caption clear">
        <div class="title-address">
            <h3 class="title"><a href="<?php echo e($row->getDetailUrl()); ?>"> <?php echo e($translation->title); ?> </a></h3>
            <p class="duration">
                <span>
                    <?php if($row->duration > 1): ?>
                        <?php echo e(__(":number hours",["number"=>$row->duration ])); ?>

                    <?php else: ?>
                        <?php echo e(__(":number hour",["number"=>$row->duration ])); ?>

                    <?php endif; ?>
                </span>
                <?php if(!empty($row->location->name)): ?>
                    -
                    <i>
                        <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                        <?php echo e($location->name ?? ''); ?>

                    </i>
                <?php endif; ?>
            </p>
        </div>
        <div class="g-price">
            <div class="price">
                <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                <span class="text-price"><?php echo e($row->display_price); ?></span>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/blocks/list-tour/loop-box-shadow.blade.php ENDPATH**/ ?>