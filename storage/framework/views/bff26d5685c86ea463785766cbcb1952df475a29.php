<div class="bravo-more-book-mobile">
    <div class="container">
        <div class="left">
            <div class="g-price">
                <div class="prefix">
                    <span class="fr_text"><?php echo e(__("from")); ?></span>
                </div>
                <div class="price">
                    <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                    <span class="text-price"><?php echo e($row->display_price); ?></span>
                </div>
            </div>

            <?php if(setting_item('sauna_enable_review')): ?>
            <?php
            $reviewData = $row->getScoreReview();
            $score_total = $reviewData['score_total'];
            ?>
            <div class="service-review tour-review-<?php echo e($score_total); ?>">
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
                <span class="review">
                        <?php if($reviewData['total_review'] > 1): ?>
                        <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                    <?php else: ?>
                        <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                    <?php endif; ?>
                    </span>
            </div>
            <?php endif; ?>
        </div>
        <div class="right">
            <?php if($row->getBookingEnquiryType() === "book"): ?>
                <a class="btn btn-primary bravo-button-book-mobile"><?php echo e(__("Book Now")); ?></a>
            <?php else: ?>
                <a class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal"><?php echo e(__("Contact Now")); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Sauna/Views/frontend/layouts/details/form-book-mobile.blade.php ENDPATH**/ ?>