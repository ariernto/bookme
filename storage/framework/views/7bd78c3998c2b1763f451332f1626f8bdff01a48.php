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
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
            <?php if($row->image_url): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="">
                <?php else: ?>
                    <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]); ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <?php if($row->star_rate): ?>
            <div class="star-rate">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                            <li><i class="fa fa-star"></i></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="item-title">
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
            <?php if($row->is_instant): ?>
                <i class="fa fa-bolt d-none"></i>
            <?php endif; ?>
                <?php echo clean($translation->title); ?>

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
    <?php if(setting_item('hotel_enable_review')): ?>
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
    <div class="info">
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text"><?php echo e(__("from")); ?></span>
            </div>
            <div class="price">
                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/night")); ?></span></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/Job/Views/frontend/layouts/search/loop-grid.blade.php ENDPATH**/ ?>