<div class="bravo-contact-block">
    <div class="container">
        <div class="row section">
            <div class="col-md-12 col-lg-5">
                <div role="form" class="form_wrapper" lang="en-US" dir="ltr">
                    <form method="post" action="<?php echo e(route("contact.store")); ?>"  class="bravo-contact-block-form">
                        <?php echo e(csrf_field()); ?>

                        <div style="display: none;">
                            <input type="hidden" name="g-recaptcha-response" value="">
                        </div>
                        <div class="contact-form">
                            <div class="contact-header">
                                <h1><?php echo e(setting_item_with_lang("page_contact_title")); ?></h1>
                                <h2><?php echo e(setting_item_with_lang("page_contact_sub_title")); ?></h2>
                            </div>
                            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="contact-form">
                                <div class="form-group">
                                    <input type="text" value="" placeholder=" <?php echo e(__('Name')); ?> " name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="" placeholder="<?php echo e(__('Email')); ?>" name="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <textarea name="message" cols="40" rows="10" class="form-control textarea" placeholder="<?php echo e(__('Message')); ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <?php echo e(recaptcha_field('contact')); ?>

                                </div>
                                <p>
                                    <button class="submit btn btn-primary " type="submit">
                                        <?php echo e(__('SEND MESSAGE')); ?>

                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                        <div class="form-mess"></div>
                    </form>

                </div>
            </div>
            <div class="offset-lg-2 col-md-12 col-lg-5">
                <div class="contact-info">
                    <div class="info-bg">
                        <?php if($bg = get_file_url(setting_item("page_contact_image"),"full")): ?>
                            <img src="<?php echo e($bg); ?>" class="img-responsive" alt="<?php echo e(setting_item_with_lang("page_contact_title")); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="info-content">
                        <div class="sub">
                            <p><?php echo setting_item_with_lang("page_contact_desc"); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Contact/Views/frontend/blocks/contact/index.blade.php ENDPATH**/ ?>