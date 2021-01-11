<div class="form-select-guests">
    <div class="form-group">
        <i class="field-icon icofont-travelling"></i>
        <div class="form-content dropdown-toggle" data-toggle="dropdown">
            <div class="wrapper-more">
                <label> <?php echo e($field['title']); ?> </label>
                <?php
                    $adults = request()->query('adults',1);
                    $children = request()->query('children',0);
                ?>
                <div class="render">
                    <span class="adults" ><span class="one <?php if($adults >1): ?> d-none <?php endif; ?>"><?php echo e(__('1 Adult')); ?></span> <span class="<?php if($adults <= 1): ?> d-none <?php endif; ?> multi" data-html="<?php echo e(__(':count Adults')); ?>"><?php echo e(__(':count Adults',['count'=>request()->query('adults',1)])); ?></span></span>
                    -
                    <span class="children" >
                            <span class="one <?php if($children >1): ?> d-none <?php endif; ?>" data-html="<?php echo e(__(':count Child')); ?>"><?php echo e(__(':count Child',['count'=>request()->query('children',0)])); ?></span>
                            <span class="multi <?php if($children <=1): ?> d-none <?php endif; ?>" data-html="<?php echo e(__(':count Children')); ?>"><?php echo e(__(':count Children',['count'=>request()->query('children',0)])); ?></span>
                        </span>
                </div>
            </div>
        </div>
        <div class="dropdown-menu select-guests-dropdown" >
            <div class="dropdown-item-row">
                <div class="label"><?php echo e(__('Rooms')); ?></div>
                <div class="val">
                    <span class="btn-minus" data-input="room"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="room" value="<?php echo e(request()->query('room',1)); ?>" min="1"></span>
                    <span class="btn-add" data-input="room"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
                <div class="label"><?php echo e(__('Adults')); ?></div>
                <div class="val">
                    <span class="btn-minus" data-input="adults"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="adults" value="<?php echo e(request()->query('adults',1)); ?>" min="1"></span>
                    <span class="btn-add" data-input="adults"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
                <div class="label"><?php echo e(__('Children')); ?></div>
                <div class="val">
                    <span class="btn-minus" data-input="children"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="children" value="<?php echo e(request()->query('children',0)); ?>" min="0"></span>
                    <span class="btn-add" data-input="children"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Hotel/Views/frontend/layouts/search/fields/guests.blade.php ENDPATH**/ ?>