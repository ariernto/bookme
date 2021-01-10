
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('module/booking/css/checkout.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Buy credits")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('user.wallet.buyProcess')); ?>" method="post">
    <div class="bravo-user-dashboard">
        <div class="panel">
            <div class="panel-title"><strong ><?php echo e(__("Buy")); ?></strong></div>
            <div class="panel-body">
                <?php echo csrf_field(); ?>

                <?php if(setting_item('wallet_deposit_type') == 'list'): ?>
                    <?php if(!empty($wallet_deposit_lists)): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                    <th scope="col"><?php echo e(__("Credit")); ?></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $wallet_deposit_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($k + 1); ?></td>
                                        <td><?php echo e($item['name']); ?></td>
                                        <td><?php echo e(format_money($item['amount'])); ?></td>
                                        <td><?php echo e($item['credit']); ?></td>
                                        <td><label class="btn btn-info" >
                                                <input type="radio" name="deposit_option" value="<?php echo e($k); ?>"> <?php echo e(__("Select")); ?> </label></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning"><?php echo e(__("Sorry, no options found")); ?></div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="form-section mt-3">
                        <h4 class="form-section-title"><?php echo e(__("How much would you like to deposit?")); ?></h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control update_exchange_value" name="deposit_amount" placeholder="<?php echo e(__('Deposit amount')); ?>" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text deposit_exchange_value" data-rate="<?php echo e((float)setting_item('wallet_deposit_rate',1)); ?>" ></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-section mt-3">
                    <h4 class="form-section-title"><?php echo e(__('Select Payment Method')); ?></h4>
                    <div class="gateways-table accordion mt-3" id="accordionExample">
                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="mb-0">
                                        <label class="" data-toggle="collapse" data-target="#gateway_<?php echo e($k); ?>" >
                                            <input type="radio" name="payment_gateway" value="<?php echo e($k); ?>">
                                            <?php if($logo = $gateway->getDisplayLogo()): ?>
                                                <img src="<?php echo e($logo); ?>" alt="<?php echo e($gateway->getDisplayName()); ?>">
                                            <?php endif; ?>
                                            <?php echo e($gateway->getDisplayName()); ?>

                                        </label>
                                    </strong>
                                </div>
                                <div id="gateway_<?php echo e($k); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="gateway_name">
                                            <?php echo $gateway->getDisplayName(); ?>

                                        </div>
                                        <?php echo $gateway->getDisplayHtml(); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <?php
                    $term_conditions = setting_item('booking_term_conditions');
                ?>

                <div class="form-group mt-3">
                    <label class="term-conditions-checkbox">
                        <input type="checkbox" name="term_conditions"> <?php echo e(__('I have read and accept the')); ?>  <a target="_blank" href="<?php echo e(get_page_url($term_conditions)); ?>"><?php echo e(__('terms and conditions')); ?></a>
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit"><?php echo e(__('Process now')); ?></button>
            </div>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/User/Views/frontend/wallet/buy.blade.php ENDPATH**/ ?>