<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Hotel Content")); ?></strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label><?php echo e(__("Title")); ?></label>
            <input type="text" value="<?php echo clean($translation->title); ?>" placeholder="<?php echo e(__("Name of the hotel")); ?>" name="title" class="form-control">
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

<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Hotel Policy")); ?></strong></div>
    <div class="panel-body">
        <?php if(is_default_lang()): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(__("Hotel rating standard")); ?></label>
                        <input type="number" value="<?php echo e($row->star_rate); ?>" placeholder="<?php echo e(__("Eg: 5")); ?>" name="star_rate" class="form-control">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group-item">
            <label class="control-label"><?php echo e(__('Policy')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                    <div class="col-md-5"><?php echo e(__('Content')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($translation->policy)): ?>
                    <?php if(!is_array($translation->policy)) $translation->policy = json_decode($translation->faqs); ?>
                    <?php $__currentLoopData = $translation->policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="policy[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item['title']); ?>" placeholder="<?php echo e(__('Eg: What kind of foowear is most suitable ?')); ?>">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="policy[<?php echo e($key); ?>][content]" class="form-control" placeholder="..."><?php echo e($item['content']); ?></textarea>
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
                            <input type="text" __name__="policy[__number__][title]" class="form-control" placeholder="<?php echo e(__('Eg: What kind of foowear is most suitable ?')); ?>">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="policy[__number__][content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\Web\Laravel\newpro\package\modules/Hotel/Views/admin/hotel/content.blade.php ENDPATH**/ ?>