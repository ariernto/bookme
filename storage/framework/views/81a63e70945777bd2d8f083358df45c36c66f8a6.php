<?php if(is_default_lang()): ?>
    <hr>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Map Search Fields")); ?></strong></div>
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
                            $accommodation_map_search_fields = setting_item_array('accommodation_map_search_fields');
                            $types = [
                                'location'=>__("Location"),
                                'attr'=>__("Attribute"),
                                'date'=>__("Date"),
                                'price'=>__("Price"),
                                'advance'=>__("Advance"),
                            ];
                            $attrs = \Modules\Core\Models\Attributes::where('service', 'accommodation')->get();
                            ?>
                            <?php $__currentLoopData = $accommodation_map_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-number="<?php echo e($key); ?>">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select name="accommodation_map_search_fields[<?php echo e($key); ?>][field]" class="custom-select">
                                                <option value=""><?php echo e(__("-- Select field type --")); ?></option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($item['field'] == $type): ?> selected <?php endif; ?> value="<?php echo e($type); ?>"><?php echo e($name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <br>
                                            <select name="accommodation_map_search_fields[<?php echo e($key); ?>][attr]" class="mt-2 custom-select">
                                                <option value=""><?php echo e(__("-- Select Attribute --")); ?></option>
                                                <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($item['attr'] == $attr->id): ?> selected <?php endif; ?> value="<?php echo e($attr->id); ?>"><?php echo e($attr->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>


                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="accommodation_map_search_fields[<?php echo e($key); ?>][position]" min="0" value="<?php echo e($item['position'] ?? 0); ?>" class="form-control">
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
                                        <select __name__="accommodation_map_search_fields[__number__][field]" class="custom-select">
                                            <option value=""><?php echo e(__("-- Select field type --")); ?></option>
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>"><?php echo e($name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <select __name__="accommodation_map_search_fields[__number__][attr]" class=" mt-2  custom-select">
                                            <option value=""><?php echo e(__("-- Select Attribute --")); ?></option>
                                            <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($attr->id); ?>"><?php echo e($attr->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" __name__="accommodation_map_search_fields[__number__][position]" min="0"  class="form-control">
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
    <hr>
<?php endif; ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Accommodation/Views/admin/settings/map-search.blade.php ENDPATH**/ ?>