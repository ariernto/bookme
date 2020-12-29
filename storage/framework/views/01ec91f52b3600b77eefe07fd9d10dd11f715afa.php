<?php if($translation->itinerary): ?>
    <div class="g-itinerary">
        <h3> <?php echo e(__("Itinerary")); ?> </h3>
        <div class="list-item owl-carousel">
            <?php $__currentLoopData = $translation->itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" style="background-image: url('<?php echo e(!empty($item['image_id']) ? get_file_url($item['image_id'],"full") : ""); ?>')">
                    <div class="header">
                        <div class="item-title"><?php echo e($item['title']); ?></div>
                        <div class="item-desc"><?php echo e($item['desc']); ?></div>
                    </div>
                    <div class="body">
                        <div class="item-title"><?php echo e($item['title']); ?></div>
                        <div class="item-desc"><?php echo e($item['desc']); ?></div>
                        <div class="item-context">
                            <?php echo clean($item['content']); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/layouts/details/tour-itinerary.blade.php ENDPATH**/ ?>