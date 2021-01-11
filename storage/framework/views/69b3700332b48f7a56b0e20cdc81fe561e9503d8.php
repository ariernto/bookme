<?php
    $activity_map_search_fields = setting_item_array('activity_map_search_fields');
    $usedAttrs = [];
    foreach ($activity_map_search_fields as $field){
        if($field['field'] == 'attr' and !empty($field['attr']))
        {
            $usedAttrs[] = $field['attr'];
        }
    }
    $selected = (array) request()->query('terms');
?>
<div id="advance_filters" class="d-none">
    <div class="ad-filter-b">
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if(in_array($item->id,$usedAttrs)) continue;
                    $translate = $item->translateOrOrigin(app()->getLocale());
            ?>
            <div class="filter-item">
                <div class="filter-title"><strong><?php echo e($translate->name); ?></strong></div>
                <ul class="filter-items row">
                    <?php $__currentLoopData = $item->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate = $term->translateOrOrigin(app()->getLocale()); ?>
                        <li class="filter-term-item col-xs-6 col-md-4">
                            <label><input <?php if(in_array($term->id,$selected)): ?> checked <?php endif; ?> type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>"> <?php echo e($translate->name); ?>
                            </label>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="ad-filter-f text-right">
        <a href="#" onclick="return false" class="btn btn-primary btn-apply-advances"><?php echo e(__("Apply Filters")); ?></a>
    </div>
</div><?php /**PATH D:\Web\Laravel\VarghaJob\bookme\modules/Activity/Views/frontend/layouts/search-map/advance-filter.blade.php ENDPATH**/ ?>