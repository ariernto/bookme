<?php if($row->getBookingEnquiryType() === "enquiry"): ?>
    <div class="bravo_single_book_wrap <?php if(setting_item('hotel_enable_inbox')): ?> has-vendor-box <?php endif; ?>">
        <div class="bravo_single_book">
            <?php if($row->discount_percent): ?>
                <div class="tour-sale-box">
                    <span class="sale_class box_sale sale_small"><?php echo e($row->discount_percent); ?></span>
                </div>
            <?php endif; ?>
            <div class="form-head">
                <div class="price">
                    <span class="label">
                        <?php echo e(__("from")); ?>

                    </span>
                    <span class="value">
                        <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                        <span class="text-lg"><?php echo e($row->display_price); ?></span>
                    </span>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    <?php echo e(__("Contact Now")); ?>

                </button>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\Web\Laravel\newpro\package\modules/Job/Views/frontend/layouts/details/hotel-form-enquiry.blade.php ENDPATH**/ ?>