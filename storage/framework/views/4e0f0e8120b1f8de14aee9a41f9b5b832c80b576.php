<div class="bravo-faq-lists">
    <div class="container">
        <h2 class="title text-center mb40"><?php echo e($title ?? ''); ?></h2>
        <?php if(!empty($list_item)): ?>
            <div class="row">
            <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="faq-item">
                        <h3><a><img class="alignnone wp-image-7754" src="<?php echo e(asset('images/ico_quest.png')); ?>" alt="" width="35" height="35"></a>&nbsp; <?php echo e($item['title']); ?></h3>
                        <p>
                            <?php echo clean($item['sub_title'],'html5-definitions'); ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Template/Views/frontend/blocks/faq-list.blade.php ENDPATH**/ ?>