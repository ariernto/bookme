<div class="bravo_header">
    <div class="<?php echo e($container_class ?? 'container-fluid'); ?>">
        <div class="content">
            <div class="header-left">
                <a href="<?php echo e(url(app_get_locale(false,'/'))); ?>" class="bravo-logo">
                    <?php if($logo_id = setting_item("logo_id")): ?>
                        <?php $logo = get_file_url($logo_id,'full') ?>
                        <img src="<?php echo e($logo); ?>" alt="<?php echo e(setting_item("site_title")); ?>">
                    <?php endif; ?>
                </a>
                <div class="bravo-menu">
                    <?php generate_menu('primary') ?>
                </div>
            </div>
            <div class="header-right">
                <ul class="topbar-items">
                    <?php echo $__env->make('Core::frontend.currency-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(!Auth::id()): ?>
                        <li class="login-item">
                            <a href="#login" data-toggle="modal" data-target="#login" class="login"><?php echo e(__('Login')); ?></a>
                        </li>
                        <li class="signup-item">
                            <a href="#register" data-toggle="modal" data-target="#register" class="signup"><?php echo e(__('Sign Up')); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="login-item dropdown">
                            <a href="#" data-toggle="dropdown" class="login"><?php echo e(__("Hi, :name",['name'=>Auth::user()->getDisplayName()])); ?>

                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu text-left">
                                <li class="credit_amount">
                                    <a href="<?php echo e(route('user.wallet')); ?>"><i class="fa fa-money"></i> <?php echo e(__("Credit: :amount",['amount'=>auth()->user()->balance])); ?></a>
                                </li>
                                <?php if(Auth::user()->hasPermissionTo('dashboard_vendor_access')): ?>
                                <li><a href="<?php echo e(route('vendor.dashboard')); ?>"><i class="icon ion-md-analytics"></i> <?php echo e(__("Vendor Dashboard")); ?></a></li>
                                <?php endif; ?>
                                <li class="<?php if(Auth::user()->hasPermissionTo('dashboard_vendor_access')): ?> menu-hr <?php endif; ?>">
                                    <a href="<?php echo e(route('user.profile.index')); ?>"><i class="icon ion-md-construct"></i> <?php echo e(__("My profile")); ?></a>
                                </li>
                                <li class="menu-hr"><a href="<?php echo e(route('user.booking_history')); ?>"><i class="fa fa-clock-o"></i> <?php echo e(__("Booking History")); ?></a></li>
                                <li class="menu-hr"><a href="<?php echo e(route('user.change_password')); ?>"><i class="fa fa-lock"></i> <?php echo e(__("Change password")); ?></a></li>
                                <?php if(Auth::user()->hasPermissionTo('dashboard_access')): ?>
                                    <li class="menu-hr"><a href="<?php echo e(url('/admin')); ?>"><i class="icon ion-ios-ribbon"></i> <?php echo e(__("Admin Dashboard")); ?></a></li>
                                <?php endif; ?>
                                <li class="menu-hr">
                                    <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?></a>
                                </li>
                            </ul>
                            <form id="logout-form-topbar" action="<?php echo e(route('auth.logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
                
            </div>
        </div>
    </div>
    <div class="bravo-menu-mobile" style="display:none;">
        <div class="user-profile">
            <div class="b-close"><i class="icofont-scroll-left"></i></div>
            <div class="avatar"></div>
            <ul>
                <?php if(!Auth::id()): ?>
                    <li>
                        <a href="#login" data-toggle="modal" data-target="#login" class="login"><?php echo e(__('Login')); ?></a>
                    </li>
                    <li>
                        <a href="#register" data-toggle="modal" data-target="#register" class="signup"><?php echo e(__('Sign Up')); ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('user.profile.index')); ?>">
                            <i class="icofont-user-suited"></i> <?php echo e(__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('user.profile.index')); ?>">
                            <i class="icon ion-md-construct"></i> <?php echo e(__("My profile")); ?>

                        </a>
                    </li>
                    <?php if(Auth::user()->hasPermissionTo('dashboard_access')): ?>
                        <li>
                            <a href="<?php echo e(url('/admin')); ?>"><i class="icon ion-ios-ribbon"></i> <?php echo e(__("Dashboard")); ?></a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                            <i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form-mobile" action="<?php echo e(route('auth.logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>

                <?php endif; ?>
            </ul>
            <ul class="multi-lang">
                <?php echo $__env->make('Core::frontend.currency-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
            <ul class="multi-lang">
                <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </div>
        <div class="g-menu">
            <?php generate_menu('primary') ?>
        </div>
    </div>
</div>
<?php /**PATH D:\Web\Laravel\VarghaJob\bookme\modules/Layout/parts/header.blade.php ENDPATH**/ ?>