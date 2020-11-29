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
        <div class="price-wrapper">
            <div class="price">
                <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/day")); ?></span></span>
            </div>
        </div>
        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
            <i class="fa fa-heart"></i>
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
    <?php if(setting_item('space_enable_review')): ?>
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>
    <div class="service-review">
        <span class="rate">
            <?php if($reviewData['total_review'] > 0): ?> <?php echo e($score_total); ?>/5 <?php endif; ?> <span class="rate-text"><?php echo e($reviewData['review_text']); ?></span>
        </span>
        <span class="review">
             <?php if($reviewData['total_review'] > 1): ?>
                <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

            <?php else: ?>
                <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

            <?php endif; ?>
        </span>
    </div>
    <?php endif; ?>
    <div class="amenities">
        <?php if($row->max_guests): ?>
            <span class="amenity total" data-toggle="tooltip"  title="<?php echo e(__("No. People")); ?>">
                <i class="input-icon field-icon icofont-people  "></i> <?php echo e($row->max_guests); ?>

            </span>
        <?php endif; ?>
        <?php if($row->bed): ?>
            <span class="amenity bed" data-toggle="tooltip" title="<?php echo e(__("No. Bed")); ?>">
                <i class="input-icon field-icon icofont-hotel"></i> <?php echo e($row->bed); ?>

            </span>
        <?php endif; ?>
        <?php if($row->bathroom): ?>
            <span class="amenity bath" data-toggle="tooltip" title="<?php echo e(__("No. Bathroom")); ?>" >
                <i class="input-icon field-icon icofont-bathtub"></i> <?php echo e($row->bathroom); ?>

            </span>
        <?php endif; ?>
        <?php if($row->square): ?>
            <span class="amenity size" data-toggle="tooltip" title="<?php echo e(__("Square")); ?>" >
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i> <?php echo size_unit_format($row->square); ?>

            </span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Space/Views/frontend/layouts/search/loop-gird.blade.php ENDPATH**/ ?>