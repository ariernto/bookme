<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('Log In')); ?></h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body relative">
                <?php echo $__env->make('Layout::auth/login-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('Sign Up')); ?></h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('Layout::auth/register-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Layout/parts/login-register-modal.blade.php ENDPATH**/ ?>