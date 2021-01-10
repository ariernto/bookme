<form action="<?php echo e(route("activity.search")); ?>" class="form bravo_form" method="get">
    <div class="g-field-search">
        <div class="row">
            <?php $activity_search_fields = setting_item_array('activity_search_fields');
            $activity_search_fields = array_values(\Illuminate\Support\Arr::sort($activity_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            ?>
            <?php if(!empty($activity_search_fields)): ?>
                <?php $__currentLoopData = $activity_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                    <div class="col-md-<?php echo e($field['size'] ?? "6"); ?> border-right">
                        <?php switch($field['field']):
                            case ('service_name'): ?>
                                <?php echo $__env->make('Activity::frontend.layouts.search.fields.service_name', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('location'): ?>
                                <?php echo $__env->make('Activity::frontend.layouts.search.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('date'): ?>
                                <?php echo $__env->make('Activity::frontend.layouts.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="g-button-submit">
        <button class="btn btn-primary btn-search" type="submit"><?php echo e(__("Search")); ?></button>
    </div>
</form><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Activity/Views/frontend/layouts/search/form-search.blade.php ENDPATH**/ ?>