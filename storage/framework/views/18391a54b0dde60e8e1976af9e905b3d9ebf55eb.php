<?php if(is_default_lang()): ?>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Check in/out time")); ?></strong></div>
        <div class="panel-body">
            <div class="form-group d-none">
                <label><?php echo e(__('Allowed full day booking')); ?></label>
                <br>
                <label>
                    <input type="checkbox" name="allow_full_day" <?php if($row->allow_full_day): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable full day booking")); ?>

                </label>
                <div class="small">
                    <?php echo e(__("You can book room with full day")); ?> <br>
                    <?php echo e(__("Eg: booking from 22-23, then all days 22 and 23 are full, other people cannot book")); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(__("Time for check in")); ?></label>
                        <input type="text" value="<?php echo e($row->check_in_time); ?>" placeholder="<?php echo e(__("Eg: 12:00AM")); ?>" name="check_in_time" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(__("Time for check out")); ?></label>
                        <input type="text" value="<?php echo e($row->check_out_time); ?>" placeholder="<?php echo e(__("Eg: 11:00AM")); ?>" name="check_out_time" class="form-control">
                    </div>
                </div>
            </div>
            <?php if(is_default_lang()): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo e(__("Min day before booking")); ?></label>
                            <input type="number" name="min_day_before_booking" class="form-control" value="<?php echo e($row->min_day_before_booking); ?>" placeholder="<?php echo e(__("Ex: 3")); ?>">
                            <i><?php echo e(__("Leave blank if you dont need to use the min day option")); ?></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo e(__("Min day stays")); ?></label>
                            <input type="number" name="min_day_stays" class="form-control" value="<?php echo e($row->min_day_stays); ?>" placeholder="<?php echo e(__("Ex: 2")); ?>">
                            <i><?php echo e(__("Leave blank if you dont need to use the min day stays option")); ?></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Pricing")); ?></strong></div>
        <div class="panel-body">
            <?php if(is_default_lang()): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo e(__("Price")); ?></label>
                            <input type="number" step="any" min="0" name="price" class="form-control" value="<?php echo e($row->price); ?>" placeholder="<?php echo e(__("Hotel Price")); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 d-none">
                        <div class="form-group">
                            <label class="control-label"><?php echo e(__("Sale Price")); ?></label>
                            <input type="number" step="any" name="sale_price" class="form-control" value="<?php echo e($row->sale_price); ?>" placeholder="<?php echo e(__("Hotel Sale Price")); ?>">
                            <span><i><?php echo e(__("If the regular price is less than the discount , it will show the regular price")); ?></i></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
                <div class="form-group <?php if(!is_default_lang()): ?> d-none <?php endif; ?>">
                    <label><input type="checkbox" name="enable_extra_price" <?php if(!empty($row->enable_extra_price)): ?> checked <?php endif; ?> value="1"> <?php echo e(__('Enable extra price')); ?>

                    </label>
                </div>
                <div class="form-group-item <?php if(!is_default_lang()): ?> d-none <?php endif; ?>" data-condition="enable_extra_price:is(1)">
                    <label class="control-label"><?php echo e(__('Extra Price')); ?></label>
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                            <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                            <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="g-items">
                    <?php if(!empty($row->extra_price)): ?>
                        <?php $__currentLoopData = $row->extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" data-number="<?php echo e($key); ?>">
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                <div class="g-lang">
                                                    <div class="title-lang"><?php echo e($language->name); ?></div>
                                                    <input type="text" name="extra_price[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($extra_price['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" name="extra_price[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($extra_price['name'] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0" name="extra_price[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($extra_price['price']); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="extra_price[<?php echo e($key); ?>][type]" class="form-control" <?php if(!is_default_lang()): ?> disabled <?php endif; ?>>
                                            <option <?php if($extra_price['type'] ==  'one_time'): ?> selected <?php endif; ?> value="one_time"><?php echo e(__("One-time")); ?></option>
                                            <option <?php if($extra_price['type'] ==  'per_day'): ?> selected <?php endif; ?> value="per_day"><?php echo e(__("Per day")); ?></option>
                                        </select>
                                        <label>
                                            <input type="checkbox" min="0" name="extra_price[<?php echo e($key); ?>][per_person]" value="on" <?php if($extra_price['per_person'] ?? ''): ?> checked <?php endif; ?> >
                                            <?php echo e(__("Price per person")); ?>

                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <?php if(is_default_lang()): ?>
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <?php if(is_default_lang()): ?>
                        <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="g-more hide">
                    <div class="item" data-number="__number__">
                        <div class="row">
                            <div class="col-md-5">
                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                        <div class="g-lang">
                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                            <input type="text" __name__="extra_price[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <input type="text" __name__="extra_price[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <select __name__="extra_price[__number__][type]" class="form-control">
                                    <option value="one_time"><?php echo e(__("One-time")); ?></option>
                                    <option value="per_day"><?php echo e(__("Per day")); ?></option>
                                </select>
                                <label>
                                    <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]" value="on">
                                    <?php echo e(__("Price per person")); ?>

                                </label>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Hotel/Views/admin/hotel/pricing.blade.php ENDPATH**/ ?>