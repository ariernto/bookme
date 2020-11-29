<div class="form-group-item">
    <label class="control-label"><?php echo e(__('Include')); ?></label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-11 text-left"><?php echo e(__("Title")); ?></div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        <?php if(!empty($translation->include)): ?>
            <?php if(!is_array($translation->include)) $translation->include = json_decode($translation->include); ?>
            <?php $__currentLoopData = $translation->include; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$include): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="text" name="include[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($include['title'] ?? ""); ?>" placeholder="<?php echo e(__('Eg: Specialized bilingual guide')); ?>">
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
                <div class="col-md-11">
                    <input type="text" __name__="include[__number__][title]" class="form-control" placeholder="<?php echo e(__('Eg: Specialized bilingual guide')); ?>">
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group-item">
    <label class="control-label"><?php echo e(__('Exclude')); ?></label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-11 text-left"><?php echo e(__("Title")); ?></div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        <?php if(!empty($translation->exclude)): ?>
            <?php if(!is_array($translation->exclude)) $translation->exclude = json_decode($translation->exclude); ?>
            <?php $__currentLoopData = $translation->exclude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$exclude): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="text" name="exclude[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($exclude['title'] ?? ""); ?>" placeholder="<?php echo e(__('Eg: Specialized bilingual guide')); ?>">
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
                <div class="col-md-11">
                    <input type="text" __name__="exclude[__number__][title]" class="form-control" placeholder="<?php echo e(__('Eg: Additional Services')); ?>">
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/admin/tour/include-exclude.blade.php ENDPATH**/ ?>