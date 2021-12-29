<div class="row mb-3">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Config Sms')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('SMS driver')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__('Sms Driver')); ?></label>
                        <div class="form-controls">
                            <select name="sms_driver" class="form-control">
                                <?php $__currentLoopData = \Modules\Sms\SettingClass::SMS_DRIVER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e((setting_item('sms_driver') ?? '') == $value ? 'selected' : ''); ?>><?php echo e(__(strtoupper($value))); ?></option>
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
<?php if(is_default_lang()): ?>
    <div class="row " data-condition="sms_driver:is(nexmo)">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__('Config Nexmo Driver')); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="sms_driver:is(nexmo)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Nexmo Api Key")); ?></label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_key" value="<?php echo e(setting_item('sms_nexmo_api_key',config('sms.nexmo.key'))); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("Nexmo Api Secret")); ?></label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_secret" value="<?php echo e(setting_item('sms_nexmo_api_secret',config('sms.nexmo.secret'))); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("From")); ?></label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_from" value="<?php echo e(setting_item('sms_nexmo_api_from',config('sms.nexmo.from'))); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-condition="sms_driver:is(twilio)">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__('Config Twilio Driver')); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="sms_driver:is(twilio)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Twilio Account Sid")); ?></label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_twilio_account_sid" value="<?php echo e(setting_item('sms_twilio_account_sid',config('sms.twilio.sid'))); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("Twilio Account Token")); ?></label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_twilio_account_token" value="<?php echo e(setting_item('sms_twilio_account_token',config('sms.twilio.token'))); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("From")); ?></label>
                            <div class="form-controls">
                                <input type="number" class="form-control" name="sms_twilio_api_from" value="<?php echo e(setting_item('sms_twilio_api_from',config('sms.twilio.from'))); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
<?php endif; ?>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('SMS Event Booking')); ?></h3>
        <div class="form-group-desc">
            <?php echo e(__('Phone number must be E.164 format')); ?>

            <p><?php echo e(__('Format')); ?>:<code> <?php echo e(__('[+][country code][subscriber number including area code]')); ?> </code></p>
            <p><?php echo e(__('Example')); ?>:<code> +12019480710</code></p>
            <div><?php echo e(__('Message')); ?>:</div>
            <?php $__currentLoopData = \Modules\Sms\Listeners\SendSmsBookingListen::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Config Phone Administrator")); ?></strong></div>
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label><?php echo e(__('Admin Phone')); ?> </label>
                    <div class="form-controls">
                        <input type="number" class="form-control" name="admin_phone_has_booking" value="<?php echo e(setting_item_with_lang('admin_phone_has_booking',request()->query('lang')) ?? ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class=""><?php echo e(__("Country")); ?></label>
                    <select name="admin_country_has_booking" class="form-control">
                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                        <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(setting_item_with_lang('admin_country_has_booking',request()->query('lang')) ==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                    <?php else: ?>
                    <p><?php echo e(__('You can edit on main lang.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Create Booking")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SmsAdminEventCreateBooking"><?php echo e(__("Administrator")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsVendorEventCreateBooking"><?php echo e(__("Vendor")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsUserEventCreateBooking"><?php echo e(__("Customer")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="SmsAdminEventCreateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_admin_has_booking')?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_admin_has_booking" value="1"> <?php echo e(__("Enable send sms to Administrator when have booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_admin_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_admin_has_booking" disabled value="1"> <?php echo e(__("Enable send sms to Administrator when have booking?")); ?></label>
                                </div>
                                <?php if(setting_item('enable_sms_admin_has_booking')!= 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div data-condition="enable_sms_admin_has_booking:is(1)">
                                <div class="form-group">
                                    <label><?php echo e(__("Message to Administrator")); ?></label>
                                    <div class="form-controls">
                                        <textarea name="sms_message_admin_when_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_admin_when_booking',request()->query('lang')) ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsVendorEventCreateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_vendor_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_vendor_has_booking" value="1"> <?php echo e(__("Enable send sms to Vendor when have booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_vendor_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_vendor_has_booking" disabled value="1"> <?php echo e(__("Enable send sms to Vendor when have booking?")); ?></label>
                                </div>
                                <?php if(setting_item('enable_sms_vendor_has_booking') != 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="form-group" data-condition="enable_sms_vendor_has_booking:is(1)">
                                <label><?php echo e(__("Message to Customer")); ?></label>
                                <div class="form-controls">
                                    <textarea name="sms_message_vendor_when_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_vendor_when_booking',request()->query('lang')) ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsUserEventCreateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_user_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_user_has_booking" value="1"> <?php echo e(__("Enable send sms to Customer when have booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_user_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_user_has_booking" disabled value="1"> <?php echo e(__("Enable send sms to Customer when have booking?")); ?></label>
                                </div>
                                <?php if(setting_item('enable_sms_user_has_booking') != 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="form-group" data-condition="enable_sms_user_has_booking:is(1)">
                                <label><?php echo e(__("Message to Customer")); ?></label>
                                <div class="form-controls">
                                    <textarea name="sms_message_user_when_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_user_when_booking',request()->query('lang')) ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Update booking")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SmsAdminEventUpdateBooking"><?php echo e(__("Administrator")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsVendorEventUpdateBooking"><?php echo e(__("Vendor")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsUserEventUpdateBooking"><?php echo e(__("Customer")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="SmsAdminEventUpdateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_admin_update_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_admin_update_booking" value="1"> <?php echo e(__("Enable send sms to Administrator when update booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_admin_update_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_admin_update_booking" disabled value="1"> <?php echo e(__("Enable send sms to Administrator when update booking?")); ?></label>
                                </div>
                                <?php if(@setting_item('enable_sms_admin_update_booking') != 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div data-condition="enable_sms_admin_update_booking:is(1)">
                                <div class="form-group">
                                    <label><?php echo e(__("Message to Administrator")); ?></label>
                                    <div class="form-controls">
                                        <textarea name="sms_message_admin_update_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_admin_update_booking',request()->query('lang')) ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsVendorEventUpdateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_vendor_update_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_vendor_update_booking" value="1"> <?php echo e(__("Enable send sms to Vendor when update booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(@setting_item('enable_sms_vendor_update_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_vendor_update_booking" disabled value="1"> <?php echo e(__("Enable send sms to Vendor when update booking?")); ?></label>
                                </div>
                                <?php if(@setting_item('enable_sms_vendor_update_booking') != 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="form-group" data-condition="enable_sms_vendor_update_booking:is(1)">
                                <label><?php echo e(__("Message to Customer")); ?></label>
                                <div class="form-controls">
                                    <textarea name="sms_message_vendor_update_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_vendor_update_booking',request()->query('lang')) ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsUserEventUpdateBooking">
                            <?php if(is_default_lang()): ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(@setting_item('enable_sms_user_update_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_user_update_booking" value="1"> <?php echo e(__("Enable send sms to Customer when update booking?")); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label> <input type="checkbox" <?php if(setting_item('enable_sms_user_has_booking') ?? '' == 1): ?> checked <?php endif; ?> name="enable_sms_user_has_booking" disabled value="1"> <?php echo e(__("Enable send sms to Customer when update booking?")); ?></label>
                                </div>
                                <?php if(@setting_item('enable_sms_user_update_booking') != 1): ?>
                                    <p><?php echo e(__('You must enable on main lang.')); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="form-group" data-condition="enable_sms_user_update_booking:is(1)">
                                <label><?php echo e(__("Message to Customer")); ?></label>
                                <div class="form-controls">
                                    <textarea name="sms_message_user_update_booking" rows="8" class="form-control"><?php echo e(setting_item_with_lang('sms_message_user_update_booking',request()->query('lang')) ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Sms Testing')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label class=""><?php echo e(__("Country")); ?></label>
                        <select name="country" class="form-control" id="country-sms-testing">
                            <option value=""><?php echo e(__('-- Select --')); ?></option>
                            <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-controls">
                        <label class=""><?php echo e(__("To (phone number)")); ?></label>
                        <input type="number" class="form-control" id="to-sms-testing" name="to"></input>
                    </div>

                    <div class="form-controls">
                        <label class=""><?php echo e(__("Message")); ?></label>
                        <textarea class="form-control" id="message-sms-testing" name="message"></textarea>
                    </div>
                    <div class="form-controls">
                        <br>
                        <div id="sms-testing" style="cursor: pointer;" class="btn btn-lg btn-primary rounded"><?php echo e(__('Send Sms Test')); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div id="sms-testing-alert" class="" role="alert">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('script.body'); ?>
    <script>
        $(document).ready(function () {
            var cant_test = 1;
            $(document).on('click', '#sms-testing', function (e) {
                event.preventDefault();
                var to = $('#to-sms-testing').val();
                var message = $('#message-sms-testing').val();
                var country = $('#country-sms-testing').val();
                $.ajax({
                    url: '<?php echo e(url('admin/module/sms/testSms')); ?>',
                    type: 'get',
                    data: {to: to, country: country, message: message},
                    beforeSend: function () {
                        $('#sms-testing').append(' <i class="fa  fa-spinner fa-spin"></i>').addClass('disabled');
                    },
                    success: function (res) {
                        if (res.error !== false) {
                            $('#sms-testing-alert').removeClass().addClass('alert alert-warning').html(res.messages);
                        } else {
                            $('#sms-testing-alert').removeClass().addClass('alert alert-success').html('<strong>Sms Test Success!</strong>');
                        }
                        cant_test = 1;
                    },
                    complete: function () {
                        $('#sms-testing').removeClass('disabled').find('i').remove();
                        cant_test = 1;
                    },
                    error: function (request, status, error) {
                        err = JSON.parse(request.responseText);
                        html = '<p><strong>' + request.statusText + '</strong></p><p>' + err.message + '</p>';
                        $('#sms-testing-alert').removeClass().addClass('alert alert-warning').html(html);
                        cant_test = 1;
                    }
                })

                setTimeout(function () {
                    $('#sms-testing-alert').html('').removeClass();
                }, 20000);
            })

        })
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Sms/Views/admin/settings/sms.blade.php ENDPATH**/ ?>