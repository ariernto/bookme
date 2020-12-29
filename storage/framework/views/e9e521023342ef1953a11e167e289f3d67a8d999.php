<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="item-loop <?php echo e($wrap_class ?? ''); ?>">
    <?php if($row->is_featured == "1"): ?>
        <div class="featured">
            <?php echo e(__("Featured")); ?>

        </div>
    <?php endif; ?>
    <div class="thumb-image ">
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">
            <?php if($row->image_url): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="">
                <?php else: ?>
                    <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]); ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
            <i class="fa fa-heart-o"></i>
        </div>
    </div>
    <div class="item-title">
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">
            <?php if($row->is_instant): ?>
                <i class="fa fa-bolt d-none"></i>
            <?php endif; ?>
            <?php echo e($translation->title); ?>

        </a>
        <?php if($row->discount_percent): ?>
            <div class="sale_info"><?php echo e($row->discount_percent); ?></div>
        <?php endif; ?>
    </div>
    <div class="location">
        <?php if(!empty($row->location->name)): ?>
            <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
            <?php echo e($location->name ?? ''); ?>

        <?php endif; ?>
    </div>
    <div class="amenities">
        <?php if($row->passenger): ?>
            <span class="amenity total" data-toggle="tooltip"  title="<?php echo e(__("Passenger")); ?>">
                <i class="input-icon field-icon icon-passenger  "></i>
                <span class="text">
                    <?php echo e($row->passenger); ?>

                </span>
            </span>
        <?php endif; ?>
        <?php if($row->gear): ?>
            <span class="amenity bed" data-toggle="tooltip" title="<?php echo e(__("Gear Shift")); ?>">
                <i class="input-icon field-icon icon-gear"></i>
                <span class="text">
                    <?php echo e($row->gear); ?>

                </span>
            </span>
        <?php endif; ?>
        <?php if($row->baggage): ?>
            <span class="amenity bath" data-toggle="tooltip" title="<?php echo e(__("Baggage")); ?>" >
                <i class="input-icon field-icon icon-baggage"></i>
                <span class="text">
                    <?php echo e($row->baggage); ?>

                </span>
            </span>
        <?php endif; ?>
        <?php if($row->door): ?>
            <span class="amenity size" data-toggle="tooltip" title="<?php echo e(__("Door")); ?>" >
                <i class="input-icon field-icon icon-door"></i>
                <span class="text">
                    <?php echo e($row->door); ?>

                </span>
            </span>
        <?php endif; ?>
    </div>
    <div class="info">
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text"><?php echo e(__("from")); ?></span>
            </div>
            <div class="price">
                <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/day")); ?></span></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Car/Views/frontend/layouts/search/loop-gird.blade.php ENDPATH**/ ?>