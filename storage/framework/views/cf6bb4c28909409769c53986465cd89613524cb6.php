<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
?>
<?php if(!empty($terms_ids) and !empty($attributes)): ?>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $translate_attribute = $attribute['parent']->translateOrOrigin(app()->getLocale()) ?>
        <?php if(empty($attribute['parent']['hide_in_single'])): ?>
            <div class="g-attributes <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>">
                <h3><?php echo e($translate_attribute->name); ?></h3>
                <?php $terms = $attribute['child'] ?>
                <div class="list-attributes">
                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate_term = $term->translateOrOrigin(app()->getLocale()) ?>
                        <div class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>">
                            <i class="<?php echo e($term->icon ?? "icofont-check-circled icon-default"); ?>"></i>
                            <?php echo e($translate_term->name); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Space/Views/frontend/layouts/details/space-attributes.blade.php ENDPATH**/ ?>