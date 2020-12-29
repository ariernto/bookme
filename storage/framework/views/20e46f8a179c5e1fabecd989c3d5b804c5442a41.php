<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Car Content")); ?></strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label><?php echo e(__("Title")); ?></label>
            <input type="text" value="<?php echo e($translation->title); ?>" placeholder="<?php echo e(__("Name of the car")); ?>" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Content")); ?></label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($translation->content); ?></textarea>
            </div>
        </div>
        <?php if(is_default_lang()): ?>
            <div class="form-group">
                <label class="control-label"><?php echo e(__("Youtube Video")); ?></label>
                <input type="text" name="video" class="form-control" value="<?php echo e($row->video); ?>" placeholder="<?php echo e(__("Youtube link video")); ?>">
            </div>
        <?php endif; ?>
        <div class="form-group-item">
            <label class="control-label"><?php echo e(__('FAQs')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                    <div class="col-md-5"><?php echo e(__('Content')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($translation->faqs)): ?>
                    <?php if(!is_array($translation->faqs)) $translation->faqs = json_decode($translation->faqs); ?>
                    <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="faqs[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($faq['title']); ?>" placeholder="<?php echo e(__('Eg: When and where does the tour end?')); ?>">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="faqs[<?php echo e($key); ?>][content]" class="form-control" placeholder="..."><?php echo e($faq['content']); ?></textarea>
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
                        <div class="col-md-5">
                            <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="<?php echo e(__('Eg: Can I bring my pet?')); ?>">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="faqs[__number__][content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(is_default_lang()): ?>
            <div class="form-group">
                <label class="control-label"><?php echo e(__("Banner Image")); ?></label>
                <div class="form-group-image">
                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo e(__("Gallery")); ?></label>
                <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<?php if(is_default_lang()): ?>
    <div class="panel">
        <div class="panel-title"><strong><?php echo e(__("Extra Info")); ?></strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?php echo e(__("Passenger")); ?></label>
                        <input type="number" value="<?php echo e($row->passenger); ?>" placeholder="<?php echo e(__("Example: 3")); ?>" name="passenger" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?php echo e(__("Gear Shift")); ?></label>
                        <input type="text" value="<?php echo e($row->gear); ?>" placeholder="<?php echo e(__("Example: Auto")); ?>" name="gear" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?php echo e(__("Baggage")); ?></label>
                        <input type="number" value="<?php echo e($row->baggage); ?>" placeholder="<?php echo e(__("Example: 5")); ?>" name="baggage" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?php echo e(__("Door")); ?></label>
                        <input type="number" value="<?php echo e($row->door); ?>" placeholder="<?php echo e(__("Example: 4")); ?>" name="door" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Car/Views/admin/car/content.blade.php ENDPATH**/ ?>