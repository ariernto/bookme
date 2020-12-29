<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Currency")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Currency Format')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>
                    <?php echo e(__("Main Currency")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <?php echo \App\Helpers\AdminForm::select('currency_main',\App\Currency::getAll(),$settings['currency_main'] ?? 'usd','dungdt-select2-field'); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label ><?php echo e(__("Format")); ?></label>
                            <div class="form-controls">
                                <?php echo \App\Helpers\AdminForm::select('currency_format',[
                                    ['id'=>'right','name'=>__('Right (100$)')],
                                    ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                    ['id'=>'left','name'=>__('Left ($100)')],
                                    ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                ],$settings['currency_format'] ?? 'right'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label ><?php echo e(__("Thousand Separator")); ?></label>
                            <div>
                                <input type="text" name="currency_thousand" class="form-control" value="<?php echo e($settings['currency_thousand'] ?? '.'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label ><?php echo e(__("Decimal Separator")); ?></label>
                            <div>
                                <input type="text" name="currency_decimal" class="form-control" value="<?php echo e($settings['currency_decimal'] ?? ','); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label ><?php echo e(__("No. of Decimals")); ?></label>
                            <div>
                                <input type="number" name="currency_no_decimal" min=0 max = 6 class="form-control" value="<?php echo e($settings['currency_no_decimal'] ?? 2); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>
                   <?php echo e(__("Extra Currency")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group-item">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-3"><?php echo e(__("Currency")); ?></div>
                                    <div class="col-md-8"><?php echo e(__('Format')); ?></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                $extra_currency = setting_item_array('extra_currency',[]);
                                ?>
                                <?php $__currentLoopData = $extra_currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <label class="" ><?php echo e(__("Sub Currency")); ?></label>
                                                <?php echo \App\Helpers\AdminForm::select('extra_currency['.$key.'][currency_main]',\App\Currency::getAll(),$item['currency_main'] ?? '','dungdt-select2-field'); ?>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label ><?php echo e(__("Format")); ?></label>
                                                            <div class="form-controls">
                                                                <?php echo \App\Helpers\AdminForm::select('extra_currency['.$key.'][currency_format]',[
                                                                    ['id'=>'right','name'=>__('Right (100$)')],
                                                                    ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                                                    ['id'=>'left','name'=>__('Left ($100)')],
                                                                    ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                                                ],$item['currency_format'] ?? ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label ><?php echo e(__("Thousand Separator")); ?></label>
                                                            <div>
                                                                <input type="text" name="extra_currency[<?php echo e($key); ?>][currency_thousand]" class="form-control" value="<?php echo e($item['currency_thousand'] ?? '.'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label ><?php echo e(__("Decimal Separator")); ?></label>
                                                            <div>
                                                                <input type="text" name="extra_currency[<?php echo e($key); ?>][currency_decimal]" class="form-control" value="<?php echo e($item['currency_decimal'] ?? ','); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label ><?php echo e(__("No. of Decimals")); ?></label>
                                                            <div>
                                                                <input type="number" name="extra_currency[<?php echo e($key); ?>][currency_no_decimal]" min=0 max = 6 class="form-control" value="<?php echo e($item['currency_no_decimal'] ?? 2); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label ><?php echo e(__("Exchange rate")); ?></label>
                                                    <div>
                                                        <input step=any type="text" name="extra_currency[<?php echo e($key); ?>][rate]" min=0 class="form-control" value="<?php echo e($item['rate'] ?? 0); ?>">
                                                        <p><i><?php echo e(__('Example: Main currency is VND, and the extra currency is USD, so the exchange rate must be 23400 (1 USD ~ 23400 VND)')); ?></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-danger btn-lg btn-add-item rounded"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="" ><?php echo e(__("Sub Currency")); ?></label>
                                                <div class="form-controls">
                                            <?php echo \App\Helpers\AdminForm::select('extra_currency[__number__][currency_main]',\App\Currency::getAll(),'','dungdt-select2-field-lazy',true); ?>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label ><?php echo e(__("Format")); ?></label>
                                                        <div class="form-controls">
                                                            <?php echo \App\Helpers\AdminForm::select('extra_currency[__number__][currency_format]',[
                                                                ['id'=>'right','name'=>__('Right (100$)')],
                                                                ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                                                ['id'=>'left','name'=>__('Left ($100)')],
                                                                ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                                            ],'right','',true); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label ><?php echo e(__("Thousand Separator")); ?></label>
                                                        <div>
                                                            <input type="text" __name__="extra_currency[__number__][currency_thousand]" class="form-control" value=".">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label ><?php echo e(__("Decimal Separator")); ?></label>
                                                        <div>
                                                            <input type="text" __name__="extra_currency[__number__][currency_decimal]" class="form-control" value=",">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label ><?php echo e(__("No. of Decimals")); ?></label>
                                                        <div>
                                                            <input type="number" __name__="extra_currency[__number__][currency_no_decimal]" min=0 max = 6 class="form-control" value="2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label ><?php echo e(__("Exchange rate")); ?></label>
                                                <div>
                                                    <input step=any type="text" __name__="extra_currency[__number__][rate]" min=0 class="form-control" value="">
                                                    <p><i><?php echo e(__('Example: Main currency is VND, and the extra currency is USD, so the exchange rate must be 23400 (1 USD ~ 23400 VND)')); ?></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(is_default_lang()): ?>
<hr>
<div class="row">
    <div class="col-md-4">
        <h3 class="form-group-title"><?php echo e(__("Payment Gateways")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('You can enable and disable your payment gateways here')); ?></p>
    </div>
    <div class="col-md-8">
        <?php
            $all = get_payment_gateways();
        ?>
        <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if(!class_exists($gateway)) continue;
                $obj = new $gateway($k);
                $options = $obj->getOptionsConfigsFormatted();
            ?>
            <div class="panel">
                <div class="panel-title"><strong><?php echo e($obj->name); ?></strong>
                    <span data-toggle="collapse" href="#gateway_<?php echo e($k); ?>" class="panel-toggle btn btn-sm" ><i class="fa fa-chevron-down"></i></span>
                </div>
                <div class="panel-body collapse" id="gateway_<?php echo e($k); ?>">
                    <div class="" >
                        <?php App\Helpers\AdminForm::generate($options); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Booking/Views/admin/settings/payment.blade.php ENDPATH**/ ?>