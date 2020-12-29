
<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('user.admin.role.store', ['id' => ($row->id) ? $row->id : '-1'])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? 'Edit: '.$row->name : 'Add new role'); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="panel-body-title"><?php echo e(__('Role Content')); ?> </h3>
                            <div class="form-group">
                                <label><?php echo e(__('Name')); ?></label>
                                <input type="text" value="<?php echo e($row->name); ?>" placeholder="<?php echo e(__('Role Name')); ?>" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>&nbsp;</span>
                        <button class="btn btn-primary" type="submit"><?php echo e(__('Save Change')); ?></button>
                    </div>
                </div>
            </div>

        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/User/Views/admin/role/detail.blade.php ENDPATH**/ ?>