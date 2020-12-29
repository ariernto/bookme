<?php
/**
 * @var $translation \Modules\Sauna\Models\SaunaTranslation
 * @var $row \Modules\Sauna\Models\Sauna
 */
?>
<div class="g-header">
    <div class="left">
        <h1><?php echo e($translation->title); ?></h1>
        <?php if($translation->address): ?>
            <p class="address"><i class="fa fa-map-marker"></i>
                <?php echo e($translation->address); ?>

            </p>
        <?php endif; ?>
    </div>
    <div class="right">
        <?php if($row->getReviewEnable()): ?>
            <?php if($review_score): ?>
                <div class="review-score">
                    <div class="head">
                        <div class="left">
                            <span class="head-rating"><?php echo e($review_score['score_text']); ?></span>
                            <span class="text-rating"><?php echo e(__("from :number reviews",['number'=>$review_score['total_review']])); ?></span>
                        </div>
                        <div class="score">
                            <?php echo e($review_score['score_total']); ?><span>/5</span>
                        </div>
                    </div>
                    <div class="foot">
                        <?php echo e(__(":number% of guests recommend",['number'=>$row->recommend_percent])); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php if(!empty($row->duration)  or !empty($row->location->name)): ?>
    <div class="g-sauna-feature">
        <div class="row">
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-heart-beat"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Wishlist")); ?></h4>
                        <p class="value">
                            <?php echo e(__("People interest: :number",['number'=>$row->getNumberWishlistInService()])); ?>

                        </p>
                    </div>
                </div>
            </div>
            <?php if($row->start_time): ?>
                <div class="col-xs-6 col-lg-3 col-md-6">
                    <div class="item">
                        <div class="icon">
                            <i class="icofont-wall-clock"></i>
                        </div>
                        <div class="info">
                            <h4 class="name"><?php echo e(__("Start Time")); ?></h4>
                            <p class="value">
                                <?php echo e($row->start_time); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($row->duration): ?>
                <div class="col-xs-6 col-lg-3 col-md-6">
                    <div class="item">
                        <div class="icon">
                            <i class="icofont-infinite"></i>
                        </div>
                        <div class="info">
                            <h4 class="name"><?php echo e(__("Duration")); ?></h4>
                            <p class="value">
                                <?php echo e(duration_format($row->duration,true)); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($row->location->name)): ?>
                <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
                <div class="col-xs-6 col-lg-3 col-md-6">
                    <div class="item">
                        <div class="icon">
                            <i class="icofont-island-alt"></i>
                        </div>
                        <div class="info">
                            <h4 class="name"><?php echo e(__("Location")); ?></h4>
                            <p class="value">
                                <?php echo e($location->name ?? ''); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if($row->getGallery()): ?>
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['large']); ?>" data-thumb="<?php echo e($item['thumb']); ?>" data-alt="<?php echo e(__("Gallery")); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="social">
            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                <ul class="share-wrapper">
                    <li>
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                            <i class="fa fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                            <i class="fa fa-twitter fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($translation->content): ?>
    <div class="g-overview">
        <h3><?php echo e(__("Description")); ?></h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Sauna::frontend.layouts.details.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($translation->faqs): ?>
<div class="g-faq">
    <h3> <?php echo e(__("FAQs")); ?> </h3>
    <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="header">
                <i class="field-icon icofont-support-faq"></i>
                <h5><?php echo e($item['title']); ?></h5>
                <span class="arrow"><i class="fa fa-angle-down"></i></span>
            </div>
            <div class="body">
                <?php echo e($item['content']); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php if($row->map_lat && $row->map_lng): ?>
<div class="g-location">
    <h3><?php echo e(__("Location")); ?></h3>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Sauna/Views/frontend/layouts/details/detail.blade.php ENDPATH**/ ?>