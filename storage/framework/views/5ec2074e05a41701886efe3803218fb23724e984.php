<?php if($meta = $row->meta): ?>
    <?php if($meta->enable_open_hours): ?>
        <?php $open_hours = $meta->open_hours ?>
        <?php $n = date('N') ?>
        <div class="owner-info widget-box" style="margin-top: 20px;">
            <?php for($i = 1 ; $i <=7 ; $i++): ?>
                <div class="open-hour-item <?php if($n == $i): ?> current <?php endif; ?>">
                    <strong>
                        <?php switch($i):
                            case (1): ?>
                            <?php echo e(__('Monday')); ?>

                            <?php break; ?>
                            <?php case (2): ?>
                            <?php echo e(__('Tuesday')); ?>

                            <?php break; ?>
                            <?php case (3): ?>
                            <?php echo e(__('Wednesday')); ?>

                            <?php break; ?>
                            <?php case (4): ?>
                            <?php echo e(__('Thursday')); ?>

                            <?php break; ?>
                            <?php case (5): ?>
                            <?php echo e(__('Friday')); ?>

                            <?php break; ?>
                            <?php case (6): ?>
                            <?php echo e(__('Saturday')); ?>

                            <?php break; ?>
                            <?php case (7): ?>
                            <?php echo e(__('Sunday')); ?>

                            <?php break; ?>
                        <?php endswitch; ?>
                    </strong>
                    <span class="open-hour-detail">
                        <?php if(empty($open_hours[$i]['enable'])): ?>
                            <span class="text text-danger"><?php echo e(__("Closed")); ?></span>
                        <?php else: ?>
                            <?php echo e($open_hours[$i]['from']); ?> - <?php echo e($open_hours[$i]['to']); ?>

                        <?php endif; ?>
                    </span>
                </div>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/layouts/details/open-hours.blade.php ENDPATH**/ ?>