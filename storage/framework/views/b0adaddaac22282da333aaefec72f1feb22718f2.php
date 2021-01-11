<div class="form-group">
    <i class="field-icon icofont-wall-clock"></i>
    <div class="form-content">
        <div class="form-date-search">
            <div class="date-picker ">
                <label><?php echo e($field['title'] ?? ""); ?></label>
                <div class="render "><?php echo e(Request::query('start',display_date(strtotime("today")))); ?></div>
            </div>
            <input type="hidden" class="check-in-input" value="<?php echo e(Request::query('start',display_date(strtotime("today")))); ?>" name="start">
            <input type="text" class="check-in-out" name="date" value="<?php echo e(Request::query('date',date("Y-m-d"))); ?>">
        </div>
    </div>
</div><?php /**PATH D:\Web\Laravel\VarghaJob\bookme\modules/Activity/Views/frontend/layouts/search/fields/date.blade.php ENDPATH**/ ?>