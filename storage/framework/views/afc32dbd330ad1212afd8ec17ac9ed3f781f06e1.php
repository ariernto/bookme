<?php
$service = $row->service;
?>
<?php if(!empty($service)): ?>
    <div class="item-list">
        <?php if($service->discount_percent): ?>
            <div class="sale_info"><?php echo e($service->discount_percent); ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-3">
                <?php if($service->is_featured == "1"): ?>
                    <div class="featured">
                        <?php echo e(__("Featured")); ?>

                    </div>
                <?php endif; ?>
                <div class="thumb-image">
                    <a href="<?php echo e($service->getDetailUrl()); ?>" target="_blank">
                        <?php if($service->image_url): ?>
                            <img src="<?php echo e($service->image_url); ?>" class="img-responsive" alt="">
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="item-title">
                    <a href="<?php echo e($service->getDetailUrl()); ?>" target="_blank">
                        <?php echo e($service->title); ?>

                    </a>
                </div>
                <div class="location">
                    <i class="icofont-license"></i>
                    <?php echo e(__("Service Type")); ?>: <span class="badge badge-info"><?php echo e($service->getModelName() ?? ''); ?></span>
                </div>
                <div class="location">
                    <?php if(!empty($service->location->name)): ?>
                        <i class="icofont-paper-plane"></i>
                        <?php echo e(__("Location")); ?>: <?php echo e($service->location->name ?? ''); ?>

                    <?php endif; ?>
                </div>
                <div class="location">
                    <i class="icofont-money"></i>
                    <?php echo e(__("Price")); ?>: <span class="sale-price"><?php echo e($service->display_sale_price); ?></span> <span class="price"><?php echo e($service->display_price); ?></span>
                </div>
                <?php if($service->getReviewEnable()): ?>
                    <div class="rate">
                        <i class="icofont-badge"></i>
                        <?php
                        $reviewData = $service->getScoreReview();
                        $score_total = $reviewData['score_total'];
                        ?>
                        <div class="service-review tour-review-<?php echo e($score_total); ?>">
                    <span class="review">
                        <?php if($reviewData['total_review'] > 1): ?>
                            <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                        <?php else: ?>
                            <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                        <?php endif; ?>
                    </span>
                            <div class="list-star">
                                <ul class="booking-item-rating-stars">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <div class="booking-item-rating-stars-active" style="width: <?php echo e($score_total * 2 * 10 ?? 0); ?>%">
                                    <ul class="booking-item-rating-stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="control-action">
                    <a href="<?php echo e($service->getDetailUrl()); ?>" target="_blank" class="btn btn-info"><?php echo e(__("View")); ?></a>
                    <a href="<?php echo e(route('user.wishList.remove',['id'=>$service->id , 'type' => $service->type])); ?>" class="btn btn-warning"><?php echo e(__("Remove")); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/User/Views/frontend/wishList/loop-list.blade.php ENDPATH**/ ?>