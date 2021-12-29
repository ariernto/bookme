<?php if(is_default_lang()): ?>
    <?php $languages = \Modules\Language\Models\Language::getActive(); ?>
    <hr>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Form Search Fields")); ?></strong></div>
        <div class="panel-body">
            <div class="form-group" >
                <label class="" ><?php echo e(__("Search Criteria")); ?></label>
                <div class="form-controls">
                    <div class="form-group-item">
                        <div class="g-items-header">
                            <div class="row">
                                <div class="col-md-7"><?php echo e(__("Search Field")); ?></div>
                                <div class="col-md-4"><?php echo e(__("Order")); ?></div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="g-items">
                            <?php
                            $space_search_fields = setting_item_array('space_search_fields');
                            $types = [
                                'service_name'=>__("Service name"),
                                'location'=>__("Location"),
                                'date'=>__("Date"),
                                'guests'=>__("Guests"),
                            ];
                            ?>
                            <?php $__currentLoopData = $space_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-number="<?php echo e($key); ?>">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                    <div class="g-lang">
                                                        <div class="title-lang"><?php echo e($language->name); ?></div>
                                                        <input type="text" name="space_search_fields[<?php echo e($key); ?>][title<?php echo e($key_lang); ?>]" value="<?php echo e($item['title'.$key_lang] ?? ''); ?>" class="form-control">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <input type="text" name="space_search_fields[<?php echo e($key); ?>][title]" value="<?php echo e($item['title']); ?>" class="form-control">
                                            <?php endif; ?>
                                            <select name="space_search_fields[<?php echo e($key); ?>][field]" class="custom-select">
                                                <option value=""><?php echo e(__("-- Select field type --")); ?></option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($item['field'] == $type): ?> selected <?php endif; ?> value="<?php echo e($type); ?>"><?php echo e($name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <br>
                                            <select name="space_search_fields[<?php echo e($key); ?>][size]" class="mt-2 custom-select">
                                                <option <?php if($item['size'] == 6): ?> selected <?php endif; ?> value="6"><?php echo e(__("Size Column 6")); ?></option>
                                                <option <?php if($item['size'] == 4): ?> selected <?php endif; ?> value="4"><?php echo e(__("Size Column 4")); ?></option>
                                                <option <?php if($item['size'] == 3): ?> selected <?php endif; ?> value="3"><?php echo e(__("Size Column 3")); ?></option>
                                                <option <?php if($item['size'] == 2): ?> selected <?php endif; ?> value="2"><?php echo e(__("Size Column 2")); ?></option>
                                                <option <?php if($item['size'] == 1): ?> selected <?php endif; ?> value="1"><?php echo e(__("Size Column 1")); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="space_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item['position'] ?? 0); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="text-right">
                            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                        </div>
                        <div class="g-more hide">
                            <div class="item" data-number="__number__">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" __name__="space_search_fields[__number__][title]" value="" class="form-control">
                                        <select __name__="space_search_fields[__number__][field]" class="custom-select">
                                            <option value=""><?php echo e(__("-- Select field type --")); ?></option>
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>"><?php echo e($name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <br>
                                        <select __name__="space_search_fields[__number__][size]" class="mt-2 custom-select">
                                            <option value="6"><?php echo e(__("Size Column 6")); ?></option>
                                            <option value="4"><?php echo e(__("Size Column 4")); ?></option>
                                            <option value="3"><?php echo e(__("Size Column 3")); ?></option>
                                            <option value="2"><?php echo e(__("Size Column 2")); ?></option>
                                            <option value="1"><?php echo e(__("Size Column 1")); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" __name__="space_search_fields[__number__][position]" min="0"  class="form-control">
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
        </div>
    </div>
<?php endif; ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Space/Views/admin/settings/form-search.blade.php ENDPATH**/ ?>