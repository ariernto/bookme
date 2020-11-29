<div class="item-list">
    <?php if($row->discount_percent): ?>
        <div class="sale_info"><?php echo e($row->discount_percent); ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <?php if($row->is_featured == "1"): ?>
                <div class="featured">
                    <?php echo e(__("Featured")); ?>

                </div>
            <?php endif; ?>
            <div class="thumb-image">
                <a href="<?php echo e($row->getDetailUrl()); ?>" target="_blank">
                    <?php if($row->image_url): ?>
                        <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="">
                    <?php endif; ?>
                </a>
                <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                    <i class="fa fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="item-title">
                <a href="<?php echo e($row->getDetailUrl()); ?>" target="_blank">
                    <?php echo e($row->title); ?>

                </a>
            </div>
            <div class="location">
                <?php if(!empty($row->location->name)): ?>
                    <i class="icofont-paper-plane"></i>
                    <?php echo e(__("Location")); ?>: <span><?php echo e($row->location->name ?? ''); ?></span>
                <?php endif; ?>
            </div>
            <div class="location">
                <i class="icofont-money"></i>
                <?php echo e(__("Price")); ?>: <span class="sale-price"><?php echo e($row->display_sale_price_admin); ?></span> <span class="price"><?php echo e($row->display_price_admin); ?></span>
            </div>
            <div class="location">
                <i class="icofont-ui-settings"></i>
                <?php echo e(__("Status")); ?>: <span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span>
            </div>
            <div class="location">
                <i class="icofont-wall-clock"></i>
                <?php echo e(__("Last Updated")); ?>: <span><?php echo e(display_datetime($row->updated_at ?? $row->created_at)); ?></span>
            </div>
            <div class="control-action">
                <a href="<?php echo e($row->getDetailUrl()); ?>" target="_blank" class="btn btn-info"><?php echo e(__("View")); ?></a>
                <?php if(!empty($recovery)): ?>
                    <a href="<?php echo e(route("hotel.vendor.restore",[$row->id])); ?>" class="btn btn-recovery btn-primary" data-confirm="<?php echo e(__('"Do you want to recovery?"')); ?>"><?php echo e(__("Recovery")); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->hasPermissionTo('hotel_update')): ?>
                    <a href="<?php echo e(route("hotel.vendor.edit",[$row->id])); ?>" class="btn btn-warning"><?php echo e(__("Edit")); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->hasPermissionTo('hotel_delete')): ?>
                    <a href="<?php echo e(route("hotel.vendor.delete",[$row->id])); ?>" class="btn btn-danger" data-confirm="<?php echo e(__('"Do you want to delete?"')); ?>>"><?php echo e(__("Del")); ?></a>
                <?php endif; ?>
                <?php if($row->status == 'publish'): ?>
                    <a href="<?php echo e(route("hotel.vendor.bulk_edit",[$row->id,'action' => "make-hide"])); ?>" class="btn btn-secondary"><?php echo e(__("Make hide")); ?></a>
                <?php endif; ?>
                <?php if($row->status == 'draft'): ?>
                    <a href="<?php echo e(route("hotel.vendor.bulk_edit",[$row->id,'action' => "make-publish"])); ?>" class="btn btn-success"><?php echo e(__("Make publish")); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Hotel/Views/frontend/vendorHotel/loop-list.blade.php ENDPATH**/ ?>