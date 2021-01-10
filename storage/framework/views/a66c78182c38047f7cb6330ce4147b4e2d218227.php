

<?php $__env->startSection('content'); ?>
    <?php
        $vendor_payout_methods = json_decode(setting_item('vendor_payout_methods'));
        if(!is_array($vendor_payout_methods)) $vendor_payout_methods = [];
        $payout_accounts = $currentUser->payout_accounts;
    ?>
    <h2 class="title-bar">
        <?php echo e(__("Vendor Payouts")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="booking-history-manager">
        <?php if(!empty($vendor_payout_methods)): ?>
            <div class="row">
                <?php if(!empty($payout_accounts)): ?>
                <div class="col-md-6">
                    <?php echo $__env->make("Vendor::frontend.payouts.request", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <?php echo $__env->make("Vendor::frontend.payouts.setup", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-danger"><?php echo e(__("No payout methods available. Please contact administrator")); ?></div>
        <?php endif; ?>
        <?php if(count($payouts)): ?>
        <hr>
        <h4><?php echo e(__("Payout history")); ?></h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-booking-history">
                <thead>
                    <tr>
                        <th width="2%"><?php echo e(__("#")); ?></th>
                        <th><?php echo e(__("Amount")); ?></th>
                        <th><?php echo e(__("Payout Method")); ?></th>
                        <th><?php echo e(__("Date Request")); ?></th>
                        <th><?php echo e(__("Notes")); ?></th>
                        <th><?php echo e(__("Date Processed")); ?></th>
                        <th><?php echo e(__("Status")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#<?php echo e($payout->id); ?></td>
                            <th><?php echo e(format_money($payout->amount)); ?></th>
                            <td>
                                <?php echo e(__(':name to :info',['name'=>$payout->payout_method_name,'info'=>$payout->account_info])); ?>

                            </td>
                            <td><?php echo e(display_date($payout->created_at)); ?></td>
                            <td>
                                <?php if($payout->note_to_admin): ?>
                                    <label ><strong><?php echo e(__("To admin:")); ?></strong></label>
                                    <br>
                                    <div><?php echo e($payout->note_to_admin); ?></div>
                                <?php endif; ?>
                                <?php if($payout->note_to_vendor): ?>
                                    <label ><strong><?php echo e(__("To vendor:")); ?></strong></label>
                                    <br>
                                    <div><?php echo e($payout->note_to_vendor); ?></div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($payout->pay_date ? display_date($payout->pay_date) : ''); ?></td>
                            <td><?php echo e($payout->status_text); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="bravo-pagination">
            <?php echo e($payouts->appends(request()->query())->links()); ?>

        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Vendor/Views/frontend/payouts/index.blade.php ENDPATH**/ ?>