<?php
    $actives = \App\Currency::getActiveCurrency();
    $current = \App\Currency::getCurrent('currency_main');
?>

<?php if(!empty($actives) and count($actives) > 1): ?>
    <li class="dropdown">
        <?php $__currentLoopData = $actives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($current == $currency['currency_main']): ?>
                <a href="#" data-toggle="dropdown" class="is_login">
                    <?php echo e(strtoupper($currency['currency_main'])); ?>

                    <i class="fa fa-angle-down"></i>
                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <ul class="dropdown-menu text-left width-auto">
            <?php $__currentLoopData = $actives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($current != $currency['currency_main']): ?>
                    <li>
                        <a href="<?php echo e(get_currency_switcher_url($currency['currency_main'])); ?>" class="is_login">
                            <?php echo e(strtoupper($currency['currency_main'])); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Core/Views/frontend/currency-switcher.blade.php ENDPATH**/ ?>