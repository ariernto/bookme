<?php
    $user = Auth::user();
    $languages = \Modules\Language\Models\Language::getActive();
?>

<?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
    <div class="language-dropdown mb-4" id="language-dropdown" >
        <div class="dropdown">
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(request()->lang == $language->locale or (!request()->lang && $language->locale == setting_item('site_locale'))): ?>
                    <button class="btn btn-default border dropdown-toggle" type="button" id="dropdownLangButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if($language->flag): ?>
                            <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                        <?php endif; ?>
                        <?php echo e($language->name); ?>

                    </button>
                <?php endif; ?>            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="dropdown-menu" aria-labelledby="dropdownLangButton">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item" href="<?php echo e(add_query_arg(['lang'=>$language->locale])); ?>">
                        <?php if($language->flag): ?>
                            <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                        <?php endif; ?>
                        <?php echo e($language->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php if(request()->query('lang')): ?>
        <input type="hidden" name="lang" value="<?php echo e(request()->query('lang')); ?>">
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Language/Views/admin/dropdown.blade.php ENDPATH**/ ?>