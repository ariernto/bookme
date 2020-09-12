<div class="form-group">
    <label><?php echo e(__('Title')); ?></label>
    <input type="text" value="<?php echo e($translation->title ?? 'New Post'); ?>" placeholder="News title" name="title" class="form-control">
</div>
<div class="form-group">
    <label class="control-label"><?php echo e(__('Content')); ?> </label>
    <div class="">
        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($translation->content); ?></textarea>
    </div>
</div>
 <?php /**PATH D:\Web\Laravel\newpro\package\modules/News/Views/admin/news/form.blade.php ENDPATH**/ ?>