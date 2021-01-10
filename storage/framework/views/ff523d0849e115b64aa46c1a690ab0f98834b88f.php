
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e($page_title); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="booking-history-manager">
        <div class="tabbable">
            <?php if(!empty($rows) and $rows->total() > 0): ?>
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%"><?php echo e(__("Type")); ?></th>
                                <th><?php echo e(__('Service Info')); ?></th>
                                <th><?php echo e(__('Customer Info')); ?></th>
                                <th width="80px"><?php echo e(__('Status')); ?></th>
                                <th width="180px"><?php echo e(__('Created At')); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="booking-history-type">
                                            <?php if($service = $row->service): ?>
                                                <i class="<?php echo e($service->getServiceIconFeatured()); ?>"></i>
                                            <?php endif; ?>
                                            <small><?php echo e($row->object_model); ?></small>
                                        </td>
                                        <td>
                                            <?php if($service = $row->service): ?>
                                                <a href="<?php echo e($service->getDetailUrl()); ?>" target="_blank"><?php echo e($service->title ?? ''); ?></a>
                                            <?php else: ?>
                                                <?php echo e(__("[Deleted]")); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div><?php echo e(__("Name:")); ?> <?php echo e($row->name); ?></div>
                                            <div><?php echo e(__("Email:")); ?> <?php echo e($row->email); ?></div>
                                            <div><?php echo e(__("Phone:")); ?> <?php echo e($row->phone); ?></div>
                                            <div><?php echo e(__("Notes:")); ?> <?php echo e($row->note); ?></div>
                                        </td>
                                        <td>
                                            <span class="label label-<?php echo e($row->status); ?>"><?php echo e($row->statusName); ?></span>
                                        </td>
                                        <td><?php echo e(display_datetime($row->updated_at)); ?></td>
                                        <td width="2%">
                                            <?php if(!empty( $has_permission_enquiry_update )): ?>
                                                <a class="btn btn-xs btn-info btn-make-as" data-toggle="dropdown">
                                                    <i class="icofont-ui-settings"></i>
                                                    <?php echo e(__("Action")); ?>

                                                </a>
                                                <div class="dropdown-menu">
                                                    <?php if(!empty($statues)): ?>
                                                        <?php $__currentLoopData = $statues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(route("vendor.enquiry_report.bulk_edit" , ['id'=>$row->id , 'status'=>$status])); ?>">
                                                                <i class="icofont-long-arrow-right"></i> <?php echo e(__('Mark as: :name',['name'=>booking_status_to_text($status)])); ?>

                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6"><?php echo e(__("No data")); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            <?php else: ?>
                <?php echo e(__("No data")); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/User/Views/frontend/enquiryReport.blade.php ENDPATH**/ ?>