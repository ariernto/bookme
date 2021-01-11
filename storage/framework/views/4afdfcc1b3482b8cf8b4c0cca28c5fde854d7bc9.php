<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('General Settings')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label ><?php echo e(__("Terms & Conditions")); ?></label>
                    <div class="form-controls">
                        <?php
                        $template = !empty($settings['vendor_term_conditions']) ? \Modules\Page\Models\Page::find($settings['vendor_term_conditions'] ) : false;
                        \App\Helpers\AdminForm::select2('vendor_term_conditions',[
                            'configs'=>[
                                'ajax'=>[
                                    'url'=>url('/admin/module/page/getForSelect2'),
                                    'dataType'=>'json'
                                ]
                            ]
                        ],
                            !empty($template->id) ? [$template->id,$template->title] :false
                        )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Config Vendor')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your config vendor system')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" <?php if($settings['vendor_enable'] ?? '' == 1): ?> checked <?php endif; ?> name="vendor_enable" value="1"> <?php echo e(__("Vendor Enable?")); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-condition="vendor_enable:is(1)">
                        <label><?php echo e(__('Vendor Commission Type')); ?></label>
                        <div class="form-controls">
                            <select name="vendor_commission_type" class="form-control">
                                <option value="percent" <?php echo e(($settings['vendor_commission_type'] ?? '') == 'percent' ? 'selected' : ''); ?>><?php echo e(__('Percent')); ?></option>
                                <option value="amount" <?php echo e(($settings['vendor_commission_type'] ?? '') == 'amount' ? 'selected' : ''); ?>><?php echo e(__('Amount')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" data-condition="vendor_enable:is(1)">
                        <label><?php echo e(__('Vendor commission value')); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="vendor_commission_amount" value="<?php echo e(!empty($settings['vendor_commission_amount'])?$settings['vendor_commission_amount']:"0"); ?>">
                        </div>
                        <p>
                            <i><?php echo e(__('Example value : 10 or 10.5')); ?></i><br>
                            <i><?php echo e(__('Example: 10% commssion. Vendor get 90%, Admin get 10%')); ?></i>
                        </p>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('You can edit on main lang.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Vendor Register')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" <?php if($settings['vendor_auto_approved'] ?? '' == 1): ?> checked <?php endif; ?> name="vendor_auto_approved" value="1"> <?php echo e(__("Vendor Auto Approved?")); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Vendor Role')); ?></label>
                        <div class="form-controls">
                            <select name="vendor_role" class="form-control">

                                <?php $__currentLoopData = \Spatie\Permission\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>" <?php echo e(($settings['vendor_role'] ?? '') == $role->id ? 'selected': ''); ?>><?php echo e(ucfirst($role->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('You can edit on main lang.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Vendor Profile')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" <?php if($settings['vendor_show_email'] ?? '' == 1): ?> checked <?php endif; ?> name="vendor_show_email" value="1"> <?php echo e(__("Show vendor email in profile?")); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" <?php if($settings['vendor_show_phone'] ?? '' == 1): ?> checked <?php endif; ?> name="vendor_show_phone" value="1"> <?php echo e(__("Show vendor phone in profile?")); ?></label>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('You can edit on main lang.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if(is_default_lang()): ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Payout Options')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Payout Options")); ?></strong></div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="form-controls">
                        <label ><strong><?php echo e(__("Disable Payout Module?")); ?></strong></label>
                        <div class="form-group">
                            <label> <input type="checkbox" <?php if(setting_item('disable_payout') == 1): ?> checked <?php endif; ?> name="disable_payout" value="1"> <?php echo e(__("Yes, please disable it")); ?></label>
                        </div>
                    </div>
                </div>

                <?php $vendor_payout_booking_status = setting_item('vendor_payout_booking_status','',true) ?>
                <div class="form-group">
                    <label><strong><?php echo e(__("Booking Status Conditions")); ?></strong></label>
                    <div class="form-controls">
                        <div><label><input name="vendor_payout_booking_status[]" <?php if(in_array('processing',$vendor_payout_booking_status)): ?> checked <?php endif; ?> type="checkbox" value="processing"> <?php echo e(__("Processing")); ?></label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" <?php if(in_array('confirmed',$vendor_payout_booking_status)): ?> checked <?php endif; ?> type="checkbox" value="confirmed"> <?php echo e(__("Confirmed")); ?></label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" <?php if(in_array('completed',$vendor_payout_booking_status)): ?> checked <?php endif; ?> type="checkbox" value="completed"> <?php echo e(__("Completed")); ?></label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" <?php if(in_array('paid',$vendor_payout_booking_status)): ?> checked <?php endif; ?> type="checkbox" value="paid"> <?php echo e(__("Paid")); ?></label></div>
                    </div>
                    <p><i><?php echo e(__("Select booking status will be use for calculate payout of vendor")); ?></i></p>
                </div>
                <div class="form-group">
                    <label><strong><?php echo e(__("Payout Methods")); ?></strong></label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-1"><?php echo e(__('ID')); ?></div>
                                        <div class="col-md-8"><?php echo e(__("Name")); ?></div>
                                        <div class="col-md-2"><?php echo e(__('Order')); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $items = json_decode(setting_item('vendor_payout_methods'));
                                    if(empty($items) or !is_array($items))
                                        $items = [];
                                    ?>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input placeholder="<?php echo e(__('Eg: bank_transfer')); ?>" type="text" name="vendor_payout_methods[<?php echo e($key); ?>][id]" class="form-control" value="<?php echo e($item->id); ?>" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label ><?php echo e(__("Name")); ?></label>
                                                    <input type="text" name="vendor_payout_methods[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($item->name); ?>">
                                                    <label ><?php echo e(__("Description")); ?></label>
                                                    <textarea  name="vendor_payout_methods[<?php echo e($key); ?>][desc]" class="form-control" cols="30" rows="4"><?php echo e($item->desc); ?></textarea>
                                                    <label ><?php echo e(__("Minimum to pay")); ?></label>
                                                    <input type="text" name="vendor_payout_methods[<?php echo e($key); ?>][min]" class="form-control" value="<?php echo e($item->min ?? ''); ?>">
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="number" name="vendor_payout_methods[<?php echo e($key); ?>][order]" class="form-control" value="<?php echo e($item->order); ?>" >
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input placeholder="<?php echo e(__('Eg: bank_transfer')); ?>" type="text" __name__="vendor_payout_methods[__number__][id]" class="form-control" value="" >
                                            </div>
                                            <div class="col-md-6">
                                                <label ><?php echo e(__("Name")); ?></label>
                                                <input type="text" __name__="vendor_payout_methods[__number__][name]" class="form-control" value="">
                                                <label ><?php echo e(__("Description")); ?></label>
                                                <textarea  __name__="vendor_payout_methods[__number__][desc]" class="form-control" cols="30" rows="4"></textarea>
                                                <label ><?php echo e(__("Minimum to pay")); ?></label>
                                                <input type="text" __name__="vendor_payout_methods[__number__][min]" class="form-control" value="">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" __name__="vendor_payout_methods[__number__][order]" class="form-control" value="" >
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
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Content Email Vendor Registered')); ?></h3>
        <div class="form-group-desc"><?php echo e(__('Content email send to Vendor or Administrator when user registered.')); ?>

            <?php $__currentLoopData = \Modules\User\Listeners\SendVendorRegisterdEmail::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label> <input type="checkbox" <?php if($settings['enable_mail_vendor_registered'] ?? '' == 1): ?> checked <?php endif; ?> name="enable_mail_vendor_registered" value="1"> <?php echo e(__("Enable send email to customer when customer registered ?")); ?></label>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label> <input type="checkbox" <?php if($settings['enable_mail_vendor_registered'] ?? '' == 1): ?> checked <?php endif; ?> disabled name="enable_mail_vendor_registered" value="1"> <?php echo e(__("Enable send email to customer when customer registered ?")); ?></label>
                    </div>
                    <?php if($settings['enable_mail_vendor_registered'] != 1): ?>
                        <p><?php echo e(__('You must enable on main lang.')); ?></p>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group" data-condition="enable_mail_vendor_registered:is(1)">
                    <label><?php echo e(__("Email to vendor content")); ?></label>
                    <div class="form-controls">
                        <textarea name="vendor_content_email_registered" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('vendor_content_email_registered',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>


                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label> <input type="checkbox" <?php if($settings['admin_enable_mail_vendor_registered'] ?? '' == 1): ?> checked <?php endif; ?> name="admin_enable_mail_vendor_registered" value="1"> <?php echo e(__("Enable send email to Administrator when customer registered ?")); ?></label>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label> <input type="checkbox" <?php if($settings['admin_enable_mail_vendor_registered'] ?? '' == 1): ?> checked <?php endif; ?> disabled name="admin_enable_mail_vendor_registered" value="1"> <?php echo e(__("Enable send email to Administrator when customer registered ?")); ?></label>
                    </div>
                    <?php if($settings['admin_enable_mail_vendor_registered'] != 1): ?>
                        <p><?php echo e(__('You must enable on main lang.')); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="form-group" data-condition="admin_enable_mail_vendor_registered:is(1)">
                    <label><?php echo e(__("Email to Administrator content")); ?></label>
                    <div class="form-controls">
                        <textarea name="admin_content_email_vendor_registered" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('admin_content_email_vendor_registered',request()->query('lang'))?? ''); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Vendor/Views/admin/settings/vendor.blade.php ENDPATH**/ ?>