
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Settings")); ?>

        <a href="<?php echo e(route('user.change_password')); ?>" class="btn-change-password"><?php echo e(__("Change Password")); ?></a>
    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('user.profile.update')); ?>" method="post" class="input-has-icon">
        <?php echo csrf_field(); ?>
        <div class="panel p-4 shadow-sm mb-4">
            <div class="form-title">
                <strong><?php echo e(__("Personal Information")); ?></strong>
            </div>            
            <?php if($is_vendor_access): ?>
                <div class="form-row">                
                    <div class="form-group col-md-6">
                        <label><?php echo e(__("Business ID")); ?></label>
                        <input type="text" value="<?php echo e(old('business_id',$dataUser->business_id)); ?>" name="business_id" placeholder="<?php echo e(__("Business ID")); ?>" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label><?php echo e(__("Business name")); ?></label>
                        <input type="text" value="<?php echo e(old('business_name',$dataUser->business_name)); ?>" name="business_name" placeholder="<?php echo e(__("Business name")); ?>" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-row">
                <div class="form-group">
                    <label><?php echo e(__("E-mail")); ?></label>
                    <input type="text" name="email" value="<?php echo e(old('email',$dataUser->email)); ?>" placeholder="<?php echo e(__("E-mail")); ?>" class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><?php echo e(__("First name")); ?></label>
                    <input type="text" value="<?php echo e(old('first_name',$dataUser->first_name)); ?>" name="first_name" placeholder="<?php echo e(__("First name")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Last name")); ?></label>
                    <input type="text" value="<?php echo e(old('last_name',$dataUser->last_name)); ?>" name="last_name" placeholder="<?php echo e(__("Last name")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Phone Number")); ?></label>
                    <input type="text" value="<?php echo e(old('phone',$dataUser->phone)); ?>" name="phone" placeholder="<?php echo e(__("Phone Number")); ?>" class="form-control">
                    <i class="fa fa-phone input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Birthday")); ?></label>
                    <input type="text" value="<?php echo e(old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'')); ?>" name="birthday" placeholder="<?php echo e(__("Birthday")); ?>" class="form-control date-picker">
                    <i class="fa fa-birthday-cake input-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <label><?php echo e(__("About Yourself")); ?></label>
                <textarea name="bio" rows="5" class="form-control"><?php echo e(old('bio',$dataUser->bio)); ?></textarea>
            </div>
            <div class="form-group">
                <label><?php echo e(__("Avatar")); ?></label>
                <div class="upload-btn-wrapper">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <?php echo e(__("Browse")); ?>… <input type="file">
                            </span>
                        </span>
                        <input type="text" data-error="<?php echo e(__("Error upload...")); ?>" data-loading="<?php echo e(__("Loading...")); ?>" class="form-control text-view" readonly value="<?php echo e($dataUser->getAvatarUrl()?? __("No Image")); ?>">
                    </div>
                    <input type="hidden" class="form-control" name="avatar_id" value="<?php echo e($dataUser->avatar_id?? ""); ?>">
                    <img class="image-demo" src="<?php echo e($dataUser->getAvatarUrl()?? ""); ?>"/>
                </div>
            </div>
        </div>
        <div class="panel p-4 shadow-sm mb-5">
            <div class="form-title">
                <strong><?php echo e(__("Location Information")); ?></strong>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Address Line 1")); ?></label>
                    <input type="text" value="<?php echo e(old('address',$dataUser->address)); ?>" name="address" placeholder="<?php echo e(__("Address")); ?>" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Address Line 2")); ?></label>
                    <input type="text" value="<?php echo e(old('address2',$dataUser->address2)); ?>" name="address2" placeholder="<?php echo e(__("Address2")); ?>" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><?php echo e(__("City")); ?></label>
                    <input type="text" value="<?php echo e(old('city',$dataUser->city)); ?>" name="city" placeholder="<?php echo e(__("City")); ?>" class="form-control">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label><?php echo e(__("State")); ?></label>
                    <input type="text" value="<?php echo e(old('state',$dataUser->state)); ?>" name="state" placeholder="<?php echo e(__("State")); ?>" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Country")); ?></label>
                    <select name="country" class="form-control">
                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                        <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if((old('country',$dataUser->country ?? '')) == $id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label><?php echo e(__("Zip Code")); ?></label>
                    <input type="text" value="<?php echo e(old('zip_code',$dataUser->zip_code)); ?>" name="zip_code" placeholder="<?php echo e(__("Zip Code")); ?>" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <button class="btn btn-danger" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/User/Views/frontend/profile.blade.php ENDPATH**/ ?>