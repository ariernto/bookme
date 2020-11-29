<div class="form-group-item">
    <label class="control-label"><?php echo e(__('Itinerary')); ?></label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-2 text-left"><?php echo e(__("Image")); ?></div>
            <div class="col-md-4 text-left"><?php echo e(__("Title - Desc")); ?></div>
            <div class="col-md-5"><?php echo e(__('Content')); ?></div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        <?php if(!empty($translation->itinerary)): ?>
            <?php if(!is_array($translation->itinerary)) $translation->itinerary = json_decode($translation->itinerary); ?>
            <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('itinerary['.$key.'][image_id]',$itinerary['image_id'] ?? ''); ?>

                        </div>
                        <div class="col-md-4">
                            <input type="text" name="itinerary[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($itinerary['title'] ?? ""); ?>" placeholder="<?php echo e(__('Title: Day 1')); ?>">
                            <input type="text" name="itinerary[<?php echo e($key); ?>][desc]" class="form-control" value="<?php echo e($itinerary['desc'] ?? ""); ?>" placeholder="<?php echo e(__('Desc: TP. HCM City')); ?>">
                        </div>
                        <div class="col-md-5">
                            <textarea name="itinerary[<?php echo e($key); ?>][content]" class="form-control full-h" placeholder="..."><?php echo e($itinerary['content']); ?></textarea>
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
            <span class="btn btn-danger btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add')); ?></span>
    </div>
    <div class="g-more hide">
        <div class="item" data-number="__number__">
            <div class="row">
                <div class="col-md-2">
                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('itinerary[__number__][image_id]','','__name__'); ?>

                </div>
                <div class="col-md-4">
                    <input type="text" __name__="itinerary[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title: Day 1')); ?>">
                    <input type="text" __name__="itinerary[__number__][desc]" class="form-control" placeholder="<?php echo e(__('Desc: TP. HCM City')); ?>">
                </div>
                <div class="col-md-5">
                    <textarea __name__="itinerary[__number__][content]" class="form-control full-h" placeholder="..."></textarea>
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Activity/Views/admin/activity/itinerary.blade.php ENDPATH**/ ?>