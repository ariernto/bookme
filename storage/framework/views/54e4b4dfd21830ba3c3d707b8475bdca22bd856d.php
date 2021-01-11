
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="mb20">
            <div class="d-flex justify-content-between">
                <h1 class="title-bar"><?php echo e($group['name']); ?></h1>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-3 d-none">
                <div class="panel">
                    <div class="panel-title"><?php echo e(__('Settings Groups')); ?></div>
                    <div class="panel-body">
                        <ul class="panel-navs">
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($current_group == $k): ?> active <?php endif; ?>"><a href="<?php echo e(url('admin/module/core/settings/index/'.$k)); ?>">
                                    <?php if($row['icon']): ?>
                                    <i class="<?php echo e($row['icon']); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo e($row['name']); ?>

                                </a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <form action="<?php echo e(url('admin/module/core/settings/store/'.$current_group)); ?>" method="post" autocomplete="off">
                    <?php echo csrf_field(); ?>

                    
                    <?php echo $__env->make('Language::admin.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="lang-content-box">
                        <?php if(empty($group['view'])): ?>
                            <?php echo $__env->make('Core::admin.settings.groups.'.$current_group, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make($group['view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>

                    <hr>
                    <div class="d-flex">
                        <button class="btn btn-danger btn-lg rounded" type="submit"><?php echo e(__('Save settings')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Core/Views/admin/settings/index.blade.php ENDPATH**/ ?>