<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('module/vendor/css/vendor-register.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<div class="container">
    <div class="bravo-vendor-form-register py-5 <?php if(!empty($layout)): ?> <?php echo e($layout); ?> <?php endif; ?>">
        <div class="row">
            <div class="col-12 col-lg-5">
                <h1><?php echo e($title); ?></h1>
                <p class="sub-heading"><?php echo e($desc); ?></p>
                <form class="form bravo-form-register-vendor" method="post" action="<?php echo e(route('vendor.register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" autocomplete="off" placeholder="<?php echo e(__("First Name")); ?>">
                        <span class="invalid-feedback error error-first_name"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" autocomplete="off" placeholder="<?php echo e(__("Last Name")); ?>">
                        <span class="invalid-feedback error error-last_name"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="business_name" autocomplete="off" placeholder="<?php echo e(__("Business Name")); ?>">
                        <span class="invalid-feedback error error-business_name"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="<?php echo e(__("Phone")); ?>">
                        <span class="invalid-feedback error error-phone"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="<?php echo e(__("Email")); ?>">
                        <span class="invalid-feedback error error-email"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" autocomplete="off" placeholder="<?php echo e(__("Password")); ?>">
                        <span class="invalid-feedback error error-password"></span>
                    </div>
                    <div class="form-group">
                        <label for="term">
                            <input id="term" type="checkbox" name="term" class="mr5">
                            <?php echo __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('vendor_term_conditions'))]); ?>

                            <span class="checkmark fcheckbox"></span>
                        </label>
                        <div><span class="invalid-feedback error error-term"></span></div>
                    </div>
                    <?php if(setting_item("user_enable_register_recaptcha")): ?>
                        <div class="form-group">
                            <?php echo e(recaptcha_field($captcha_action ?? 'register_vendor')); ?>

                            <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
                        </div><!--End form-group-->
                    <?php endif; ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-submit">
                            <?php echo e(__('Sign Up')); ?>

                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true" style="display: none"></span>
                        </button>
                    </div>
                    <div class="message-error"></div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-lg-6">
                <div class="bravo_gallery">
                    <div class="btn-group">
                        <span class="btn-transparent has-icon bravo-video-popup" <?php if(!empty($youtube)): ?> data-toggle="modal" <?php endif; ?> data-src="<?php echo e(handleVideoUrl($youtube)); ?>" data-target="#video-register">
                            <?php if($bg_image): ?>
                                <img src="<?php echo e(get_file_url($bg_image,'full')); ?>" class="img-fluid" alt="Youtube">
                            <?php endif; ?>
                            <?php if(!empty($youtube)): ?>
                                <div class="play-icon">
                                    <img src="<?php echo e(asset('module/vendor/img/ico-play.svg')); ?>" alt="Play background" class="img-fluid play-image">
                                </div>
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php if(!empty($youtube)): ?>
                        <div class="modal fade" id="video-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content p-0">
                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("/module/vendor/js/vendor-register.js?_ver=".config('app.version'))); ?>"></script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Vendor/Views/frontend/blocks/form-register/index.blade.php ENDPATH**/ ?>