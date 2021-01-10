<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
<?php if(is_default_lang()): ?>
<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Pricing")); ?></strong></div>
    <div class="panel-body">
        <?php if(is_default_lang()): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label"><?php echo e(__("Price")); ?></label>
                        <input type="number" step="any" min="0" name="price" class="form-control" value="<?php echo e($row->price); ?>" placeholder="<?php echo e(__("Accommodation Price")); ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label"><?php echo e(__("Sale Price")); ?></label>
                        <input type="number" step="any" name="sale_price" class="form-control" value="<?php echo e($row->sale_price); ?>" placeholder="<?php echo e(__("Accommodation Sale Price")); ?>">
                        <span><i><?php echo e(__("If the regular price is less than the discount , it will show the regular price")); ?></i></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label"><?php echo e(__("Max Guests")); ?></label>
                        <input type="number" step="any" name="max_guests" class="form-control" value="<?php echo e($row->max_guests); ?>" >
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
                                        <option <?php if($extra_price['type'] ==  'per_hour'): ?> selected <?php endif; ?> value="per_hour"><?php echo e(__("Per hour")); ?></option>
                                        <option <?php if($extra_price['type'] ==  'per_day'): ?> selected <?php endif; ?> value="per_day"><?php echo e(__("Per day")); ?></option>
                                    </select>

                                    <label>
                                        <input <?php if(!is_default_lang()): ?> disabled <?php endif; ?> type="checkbox" min="0" name="extra_price[<?php echo e($key); ?>][per_person]" value="on" <?php if($extra_price['per_person'] ?? ''): ?> checked <?php endif; ?> >
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
                                <option value="per_hour"><?php echo e(__("Per hour")); ?></option>
                                <option value="per_day"><?php echo e(__("Per day")); ?></option>
                            </select>

                            <label>
                                <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]" class="form-control" value="on">
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
        <?php if(is_default_lang()): ?>
            <hr class="d-none">
            <h3 class="panel-body-title d-none"><?php echo e(__('Discount by number of people')); ?></h3>
            <div class="form-group-item d-none">
                <div class="g-items-header">
                    <div class="row">
                        <div class="col-md-4"><?php echo e(__("No of people")); ?></div>
                        <div class="col-md-3"><?php echo e(__('Discount')); ?></div>
                        <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="g-items">
                    <?php if(!empty($row->discount_by_people) and is_array($row->discount_by_people)): ?>
                        <?php $__currentLoopData = $row->discount_by_people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" data-number="<?php echo e($key); ?>">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][from]" class="form-control" value="<?php echo e($item['from']); ?>" placeholder="<?php echo e(__('From')); ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][to]" class="form-control" value="<?php echo e($item['from']); ?>" placeholder="<?php echo e(__('To')); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][amount]" class="form-control" value="<?php echo e($item['amount']); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="discount_by_people[<?php echo e($key); ?>][type]" class="form-control">
                                            <option <?php if($item['type'] ==  'fixed'): ?> selected <?php endif; ?> value="fixed"><?php echo e(__("Fixed")); ?></option>
                                            <option <?php if($item['type'] ==  'percent'): ?> selected <?php endif; ?> value="percent"><?php echo e(__("Percent (%)")); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                </div>
                <div class="g-more hide">
                    <div class="item" data-number="__number__">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="number" min="0" __name__="discount_by_people[__number__][from]" class="form-control" value="" placeholder="<?php echo e(__('From')); ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="number" min="0" __name__="discount_by_people[__number__][to]" class="form-control" value="" placeholder="<?php echo e(__('To')); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="number" min="0" __name__="discount_by_people[__number__][amount]" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <select __name__="discount_by_people[__number__][type]" class="form-control">
                                    <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                    <option value="percent"><?php echo e(__("Percent")); ?></option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Accommodation/Views/admin/accommodation/pricing.blade.php ENDPATH**/ ?>