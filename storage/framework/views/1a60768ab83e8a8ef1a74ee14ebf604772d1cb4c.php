<?php
    $user = Auth::user();
    $languages = \Modules\Language\Models\Language::getActive();
?>

<?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
    <div class="language-navigation" id="language-navs" >
        <ul class="nav nav-tabs" role="tablist" >
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a class="nav-link <?php if(request()->lang == $language->locale or (!request()->lang && $language->locale == setting_item('site_locale'))): ?> active <?php endif; ?>" href="<?php echo e(add_query_arg(['lang'=>$language->locale])); ?>">
                        <?php if($language->flag): ?>
                            <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                        <?php endif; ?>
                        <?php echo e($language->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php if(request()->query('lang')): ?>
        <input type="hidden" name="lang" value="<?php echo e(request()->query('lang')); ?>">
    <?php endif; ?>
<?php endif; ?><?php /**PATH D:\Web\Laravel\newpro\package\modules/Language/Views/admin/navigation.blade.php ENDPATH**/ ?>