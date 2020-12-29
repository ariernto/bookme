<?php if($translation->faqs): ?>
    <div class="g-faq">
        <h3> <?php echo e(__("FAQs")); ?> </h3>
        <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="header">
                    <i class="field-icon icofont-support-faq"></i>
                    <h5><?php echo e($item['title']); ?></h5>
                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                </div>
                <div class="body">
                    <?php echo clean($item['content']); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/layouts/details/tour-faqs.blade.php ENDPATH**/ ?>