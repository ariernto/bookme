<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php ($favicon = setting_item('site_favicon')); ?>
    <link rel="icon" type="image/png" href="<?php echo e(!empty($favicon)?get_file_url($favicon,'full'):url('images/favicon.png')); ?>" />
    <?php echo $__env->make('Layout::parts.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="<?php echo e(asset('libs/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/icofont/icofont.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600' type='text/css' media='all' />
    <script>
        var bookingCore = {
            url:'<?php echo e(url( app_get_locale() )); ?>',
            url_root:'<?php echo e(url('')); ?>',
			booking_decimals:<?php echo e((int)get_current_currency('currency_no_decimal',2)); ?>,
			thousand_separator:'<?php echo e(get_current_currency('currency_thousand')); ?>',
			decimal_separator:'<?php echo e(get_current_currency('currency_decimal')); ?>',
			currency_position:'<?php echo e(get_current_currency('currency_format')); ?>',
			currency_symbol:'<?php echo e(currency_symbol()); ?>',
			currency_rate:'<?php echo e(get_current_currency('rate',1)); ?>',
            date_format:'<?php echo e(get_moment_date_format()); ?>',
            map_provider:'<?php echo e(setting_item('map_provider')); ?>',
            map_gmap_key:'<?php echo e(setting_item('map_gmap_key')); ?>',
            routes:{
                login:'<?php echo e(route('auth.login')); ?>',
                register:'<?php echo e(route('auth.register')); ?>',
            }
        };
        var i18n = {
            warning:"<?php echo e(__("Warning")); ?>",
            success:"<?php echo e(__("Success")); ?>",
            confirm_delete:"<?php echo e(__("Do you want to delete?")); ?>",
            confirm:"<?php echo e(__("Confirm")); ?>",
            cancel:"<?php echo e(__("Cancel")); ?>",
        };
        var daterangepickerLocale = {
            "applyLabel": "<?php echo e(__('Apply')); ?>",
            "cancelLabel": "<?php echo e(__('Cancel')); ?>",
            "fromLabel": "<?php echo e(__('From')); ?>",
            "toLabel": "<?php echo e(__('To')); ?>",
            "customRangeLabel": "<?php echo e(__('Custom')); ?>",
            "weekLabel": "<?php echo e(__('W')); ?>",
            "first_day_of_week": <?php echo e(setting_item("site_first_day_of_the_weekin_calendar","1")); ?>,
            "daysOfWeek": [
                "<?php echo e(__('Su')); ?>",
                "<?php echo e(__('Mo')); ?>",
                "<?php echo e(__('Tu')); ?>",
                "<?php echo e(__('We')); ?>",
                "<?php echo e(__('Th')); ?>",
                "<?php echo e(__('Fr')); ?>",
                "<?php echo e(__('Sa')); ?>"
            ],
            "monthNames": [
                "<?php echo e(__('January')); ?>",
                "<?php echo e(__('February')); ?>",
                "<?php echo e(__('March')); ?>",
                "<?php echo e(__('April')); ?>",
                "<?php echo e(__('May')); ?>",
                "<?php echo e(__('June')); ?>",
                "<?php echo e(__('July')); ?>",
                "<?php echo e(__('August')); ?>",
                "<?php echo e(__('September')); ?>",
                "<?php echo e(__('October')); ?>",
                "<?php echo e(__('November')); ?>",
                "<?php echo e(__('December')); ?>"
            ],
        };
    </script>
    <link href="<?php echo e(asset('dist/frontend/module/user/css/user.css')); ?>" rel="stylesheet">
    <!-- Styles -->
    <?php echo $__env->yieldContent('head'); ?>
    <style type="text/css">
        .bravo_topbar, .bravo_header, .bravo_footer {
            display: none;
        }
        html, body, .bravo_wrap, .bravo_user_profile,
        .bravo_user_profile > .container-fluid > .row-eq-height > .col-md-3 {
            min-height: 100vh !important;
        }
    </style>
    
    <link href="<?php echo e(route('core.style.customCss')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/carousel-2/owl.carousel.css')); ?>" rel="stylesheet">
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
</head>
<body class="user-page <?php echo e($body_class ?? ''); ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?>">
    <?php echo setting_item('body_scripts'); ?>

    <div class="bravo_wrap">
        
        <?php echo $__env->make('Layout::parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="bravo_user_profile">
            <div class="bravo_user_sidebar">
                <?php echo $__env->make('User::frontend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="bravo_user_content">
                <div class="container-fluid">
                    <div class="user-form-settings">
                        <?php echo $__env->make('Layout::parts.user-content-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            
        </div>
        <?php echo $__env->make('Layout::parts.footer',['is_user_page'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo setting_item('footer_scripts'); ?>

</body>
</html>
<?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Layout/user.blade.php ENDPATH**/ ?>