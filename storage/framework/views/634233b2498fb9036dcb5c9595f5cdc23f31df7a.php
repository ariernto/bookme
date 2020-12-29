<?php if(!empty($location_category) and $location_category->count() > 0): ?>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Surroundings")); ?></strong></div>
        <div class="panel-body">
            <?php if(!empty($location_category)): ?>
                <?php $__currentLoopData = $location_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group-item">
                        <label class="control-label"><?php echo e($category->name); ?></label>
                        <div class="g-items-header">
                            <div class="row">
                                <div class="col-md-3"><?php echo e(__("Name")); ?></div>
                                <div class="col-md-3"><?php echo e(__('Content')); ?></div>
                                <div class="col-md-3"><?php echo e(__('Distance')); ?></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="g-items">
                            <?php if(!empty($translation->surrounding[$category->id])): ?>
                                <?php
                                    $surroundingItem = $translation->surrounding[$category->id];
                                   if(!is_array($surroundingItem)) $surroundingItem = json_decode($surroundingItem); ?>
                                <?php $__currentLoopData = $surroundingItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="surrounding[<?php echo e($category->id); ?>][<?php echo e($key); ?>][name]"
                                                       class="form-control" value="<?php echo e(@$item['name']); ?>"
                                                       placeholder="<?php echo e(__('Sunny Beach')); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <textarea name="surrounding[<?php echo e($category->id); ?>][<?php echo e($key); ?>][content]"
                                                          class="form-control"><?php echo e(@$item['content']); ?></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number"
                                                       name="surrounding[<?php echo e($category->id); ?>][<?php echo e($key); ?>][value]"
                                                       class="form-control" value="<?php echo e(@$item['value']); ?>"
                                                       placeholder="...">
                                            </div>
                                            <div class="col-md-2">
                                                <select name="surrounding[<?php echo e($category->id); ?>][<?php echo e($key); ?>][type]"
                                                        class="form-control">
                                                    <option <?php if($item['type']=='m'): ?> selected
                                                            <?php endif; ?> value="m"><?php echo e(__('m')); ?></option>
                                                    <option <?php if($item['type']=='km'): ?> selected
                                                            <?php endif; ?> value="km"><?php echo e(__('Km')); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                        class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="text-right">
                            <span class="btn btn-info btn-sm btn-add-item"><i
                                    class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                        </div>
                        <div class="g-more hide">
                            <div class="item" data-number="__number__">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" __name__="surrounding[<?php echo e($category->id); ?>][__number__][name]"
                                               class="form-control" placeholder="<?php echo e(__("Sunny Beach")); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <textarea __name__="surrounding[<?php echo e($category->id); ?>][__number__][content]"
                                                  class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number"
                                               __name__="surrounding[<?php echo e($category->id); ?>][__number__][value]"
                                               class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2">
                                        <select __name__="surrounding[<?php echo e($category->id); ?>][__number__][type]"
                                                class="form-control">
                                            <option value="m"><?php echo e(__('m')); ?></option>
                                            <option value="km"><?php echo e(__('km')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/Hotel/Views/admin/hotel/surrounding.blade.php ENDPATH**/ ?>