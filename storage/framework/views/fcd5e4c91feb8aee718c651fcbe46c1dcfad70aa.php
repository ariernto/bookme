<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Config Email')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your config email site')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__('Email Driver')); ?></label>
                        <div class="form-controls">
                            <select name="email_driver" class="form-control">
                                <?php $__currentLoopData = \Modules\Email\SettingClass::EMAIL_DRIVER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e(($settings['email_driver'] ?? '') == $value ? 'selected' : ''); ?>><?php echo e(__(strtoupper($value))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email Host')); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_host" value="<?php echo e(!empty($settings['email_host'])?$settings['email_host']:"smtp.mailgun.org"); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email Port')); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_port" value="<?php echo e(!empty($settings['email_port'])?$settings['email_port']:"587"); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email Encryption')); ?></label>
                        <div class="form-controls">
                            <select name="email_encryption" class="form-control">
                                <option value="tls" <?php echo e(($settings['email_encryption'] ?? '') == 'tls' ? 'selected' : ''); ?>>TLS</option>
                                <option value="ssl" <?php echo e(($settings['email_encryption'] ?? '') == 'ssl' ? 'selected' : ''); ?>>SSL</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email Username')); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_username" value="<?php echo e(@$settings['email_username']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email Password')); ?></label>
                        <div class="form-controls">
                            <input type="password" class="form-control" name="email_password" value="<?php echo e(@$settings['email_password']); ?>">
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
<?php if(is_default_lang()): ?>
    <div class="row" data-operator="or" data-condition="email_driver:is(mailgun),email_driver:is(postmark),email_driver:is(ses),email_driver:is(sparkpost)">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__('Config Email Service')); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="email_driver:is(mailgun)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Mailgun Domain")); ?></label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_domain" value="<?php echo e(@$settings['email_mailgun_domain']); ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <label class=""><?php echo e(__("Mailgun Secret")); ?></label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_secret" value="<?php echo e(@$settings['email_mailgun_secret']); ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <label class=""><?php echo e(__("Mailgun Endpoint")); ?></label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_endpoint" value="<?php echo e(!empty($settings['email_mailgun_endpoint'])?$settings['email_mailgun_endpoint']:"api.mailgun.net"); ?>">
                            </div>
                        </div>
                    </div>
                    <div data-condition="email_driver:is(postmark)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Postmark Token")); ?></label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_postmark_token" value="<?php echo e(@$settings['email_postmark_token']); ?>">
                            </div>
                        </div>
                    </div>
                    <div data-condition="email_driver:is(ses)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Ses Key")); ?></label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_key" value="<?php echo e(@$settings['email_ses_key']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("Ses Secret")); ?></label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_secret" value="<?php echo e(@$settings['email_ses_secret']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=""><?php echo e(__("Ses Region")); ?></label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_region" value="<?php echo e(!empty($settings['email_ses_region'])?$settings['email_ses_region']:"us-east-1"); ?>">
                            </div>
                        </div>

                    </div>
                    <div data-condition="email_driver:is(sparkpost)">
                        <div class="form-group">
                            <label class=""><?php echo e(__("Sparkpost Secret")); ?></label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_sparkpost_secret" value="<?php echo e(@$settings['email_sparkpost_secret']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Email Testing')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label class=""><?php echo e(__("Email")); ?></label>
                        <input type="email" class="form-control" id="to-email-testing" name="to_email_test"/>
                    </div>
                    <div class="form-controls">
                        <br>
                        <div id="email-testing" style="cursor: pointer;" class="btn btn-primary"><?php echo e(__('Send Email Test')); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div id="email-testing-alert" class="" role="alert">
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
        <h3 class="form-group-title"><?php echo e(__('Email Header & Footer')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change booking email header and footer')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label ><?php echo e(__("Header")); ?></label>
                    <div class="form-controls">
                        <textarea name="email_header" class="d-none has-ckeditor" data-fullurl="true" cols="30" rows="10"><?php echo e(setting_item_with_lang('email_header',request()->query('lang'))); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label ><?php echo e(__("Footer")); ?></label>
                    <div class="form-controls">
                        <textarea name="email_footer" class="d-none has-ckeditor" data-fullurl="true" cols="30" rows="10"><?php echo e(setting_item_with_lang('email_footer',request()->query('lang'))); ?></textarea>
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
            $(document).on('click', '#email-testing', function (e) {
                event.preventDefault();
                var to = $('#to-email-testing').val();
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (testEmail.test(to)) {
                    if (cant_test == 1) {
                        cant_test = 0;
                        $.ajax({
                            url: '<?php echo e(url('admin/module/email/testEmail')); ?>',
                            type: 'get',
                            data: {to: to},
                            beforeSend: function () {
                                $('#email-testing').append(' <i class="fa  fa-spinner fa-spin"></i>').addClass('disabled');
                            },
                            success: function (res) {
                                if (res.error !== false) {
                                    $('#email-testing-alert').removeClass().addClass('alert alert-warning').html(res.messages);
                                } else {
                                    $('#email-testing-alert').removeClass().addClass('alert alert-success').html('<strong>Email Test Success!</strong>');
                                }
                                cant_test = 1;
                            },
                            complete: function () {
                                $('#email-testing').removeClass('disabled').find('i').remove();
                                cant_test = 1;

                            },
                            error: function (request, status, error) {
                                err = JSON.parse(request.responseText);
                                html = '<p><strong>' + request.statusText + '</strong></p><p>' + err.message + '</p>';
                                $('#email-testing-alert').removeClass().addClass('alert alert-warning').html(html);
                                cant_test = 1;
                            }
                        })
                    }
                } else {
                    $('#email-testing-alert').removeClass().addClass('alert alert-warning').html('Please enter valid email');
                }
                setTimeout(function () {
                    $('#email-testing-alert').html('').removeClass();
                }, 2000)
            })

        })
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Email/Views/admin/settings/email.blade.php ENDPATH**/ ?>