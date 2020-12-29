<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="item-loop-list <?php echo e($wrap_class ?? ''); ?>">
    <?php if($row->is_featured == "1"): ?>
        <div class="featured">
            <?php echo e(__("Featured")); ?>

        </div>
    <?php endif; ?>
    <div class="thumb-image">
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
            <?php if($row->image_url): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="">
                <?php else: ?>
                    <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]); ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="g-info">
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
        <div class="item-title">
            <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
                <?php if($row->is_instant): ?>
                    <i class="fa fa-bolt d-none"></i>
                <?php endif; ?>
                <?php echo e($translation->title); ?>

            </a>
        </div>
        <?php if(!empty($attribute = $row->getAttributeInListingPage())): ?>
            <?php
                $translate_attribute =  $attribute->translateOrOrigin(app()->getLocale());
                $termsByAttribute = $row->termsByAttributeInListingPage
            ?>
            <div class="terms">
                <div class="g-attributes">
                    <span class="attr-title"><i class="icofont-medal"></i> <?php echo e($translate_attribute->name ?? ""); ?>: </span>
                    <?php $__currentLoopData = $termsByAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate_term = $term->translateOrOrigin(app()->getLocale()) ?>
                        <span class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>"><?php echo e($translate_term->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="location">
            <?php if(!empty($row->location->name)): ?>
                <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                <i class="icofont-paper-plane"></i>
                <?php echo e($location->name ?? ''); ?>

            <?php endif; ?>
        </div>
    </div>
    <div class="g-rate-price">
        <?php if(setting_item('hotel_enable_review')): ?>
            <?php  $reviewData = $row->getScoreReview(); ?>
            <div class="service-review-pc">
                <div class="head">
                    <div class="left">
                        <span class="head-rating"><?php echo e($reviewData['review_text']); ?></span>
                        <span class="text-rating"><?php echo e(__(":number reviews",['number'=>$reviewData['total_review']])); ?></span>
                    </div>
                    <div class="score">
                        <?php echo e($reviewData['score_total']); ?><span>/5</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text"><?php echo e(__("from")); ?></span>
            </div>
            <div class="price">
                <span class="text-price"><?php echo e($row->display_price); ?> <span class="unit"><?php echo e(__("/night")); ?></span></span>
            </div>
            <?php if(!empty($reviewData['total_review'])): ?>
                <div class="text-review">
                    <?php echo e(__(":number reviews",['number'=>$reviewData['total_review']])); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Hotel/Views/frontend/layouts/search/loop-list.blade.php ENDPATH**/ ?>