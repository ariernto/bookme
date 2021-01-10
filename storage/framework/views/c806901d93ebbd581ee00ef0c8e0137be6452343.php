<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Page Search")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page search of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("General Options")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="sauna_page_search_title" value="<?php echo e(setting_item_with_lang('sauna_page_search_title',request()->query('lang'))); ?>" class="form-control">
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Banner Page")); ?></label>
                    <div class="form-controls form-group-image">
                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('sauna_page_search_banner',$settings['sauna_page_search_banner'] ?? ""); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Layout Search")); ?></label>
                    <div class="form-controls">
                        <select name="sauna_layout_search" class="form-control" >
                            <option value="normal" <?php echo e(($settings['sauna_layout_search'] ?? '') == 'normal' ? 'selected' : ''); ?>><?php echo e(__("Normal Layout")); ?></option>
                            <option value="map" <?php echo e(($settings['sauna_layout_search'] ?? '') == 'map' ? 'selected' : ''); ?>><?php echo e(__('Map Layout')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Limit item per Page")); ?></label>
                    <div class="form-controls">
                        <input type="number" min="1" name="sauna_page_limit_item" value="<?php echo e(setting_item_with_lang('sauna_page_limit_item',request()->query('lang'), 9)); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Location Search Style")); ?></label>
                    <div class="form-controls">
                        <select name="sauna_location_search_style" class="form-control">
                            <option <?php echo e(($settings['sauna_location_search_style'] ?? '') == 'normal' ? 'selected' : ''); ?>      value="normal"><?php echo e(__("Normal")); ?></option>
                            <option <?php echo e(($settings['sauna_location_search_style'] ?? '') == 'autocomplete' ? 'selected' : ''); ?> value="autocomplete"><?php echo e(__('Autocomplete from locations')); ?></option>
                            <option <?php echo e(($settings['sauna_location_search_style'] ?? '') == 'autocompletePlace' ? 'selected' : ''); ?> value="autocompletePlace"><?php echo e(__('Autocomplete from Gmap Place')); ?></option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php echo $__env->make('Sauna::admin.settings.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('Sauna::admin.settings.map-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("SEO Options")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#seo_1"><?php echo e(__("General Options")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_2"><?php echo e(__("Share Facebook")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_3"><?php echo e(__("Share Twitter")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane active" id="seo_1">
                            <div class="form-group" >
                                <label class="control-label"><?php echo e(__("Seo Title")); ?></label>
                                <input type="text" name="sauna_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('sauna_page_list_seo_title',request()->query('lang'))); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="sauna_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('sauna_page_list_seo_desc',request()->query('lang'))); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('sauna_page_list_seo_image', $settings['sauna_page_list_seo_image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                            $seo_share = json_decode(setting_item_with_lang('sauna_page_list_seo_desc',request()->query('lang'),'[]'),true);
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="sauna_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="sauna_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('sauna_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="sauna_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="sauna_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                                <div class="form-group form-group-image">
                                    <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('sauna_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(is_default_lang()): ?>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Review Options")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Config review for sauna')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Enable review system for Sauna?")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="sauna_enable_review" value="1" <?php if(!empty($settings['sauna_enable_review'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes, please enable it")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("Turn on the mode for reviewing sauna")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="sauna_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Customer must book a sauna before writing a review?")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="sauna_enable_review_after_booking" value="1"  <?php if(!empty($settings['sauna_enable_review_after_booking'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes please")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("ON: Only post a review after booking - Off: Post review without booking")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="sauna_enable_review:is(1),sauna_enable_review_after_booking:is(1)">
                        <label class="" ><?php echo e(__("Allow Review after making Completed Booking?")); ?></label>
                        <div class="form-controls">
                            <?php
                                $status = config('booking.statuses');
                                $settings_status = !empty($settings['sauna_allow_review_after_making_completed_booking']) ? json_decode($settings['sauna_allow_review_after_making_completed_booking']) : [];
                            ?>
                            <div class="row">
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <label><input type="checkbox" name="sauna_allow_review_after_making_completed_booking[]" <?php if(in_array($item,$settings_status)): ?> checked <?php endif; ?> value="<?php echo e($item); ?>"  /> <?php echo e(booking_status_to_text($item)); ?> </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <small class="form-text text-muted"><?php echo e(__("Pick to the Booking Status, that allows reviews after booking")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="sauna_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review must be approval by admin")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="sauna_review_approved" value="1"  <?php if(!empty($settings['sauna_review_approved'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes please")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("ON: Review must be approved by admin - OFF: Review is automatically approved")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="sauna_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review number per page")); ?></label>
                        <div class="form-controls">
                            <input type="number" class="form-control" name="sauna_review_number_per_page" value="<?php echo e($settings['sauna_review_number_per_page'] ?? 5); ?>" />
                            <small class="form-text text-muted"><?php echo e(__("Break comments into pages")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="sauna_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review criteria")); ?></label>
                        <div class="form-controls">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    if(!empty($settings['sauna_review_stats'])){
                                    $social_share = json_decode($settings['sauna_review_stats']);
                                    ?>
                                    <?php $__currentLoopData = $social_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input type="text" name="sauna_review_stats[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item->title); ?>" placeholder="<?php echo e(__('Eg: Service')); ?>">
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php } ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="text" __name__="sauna_review_stats[__number__][title]" class="form-control" value="" placeholder="<?php echo e(__('Eg: Service')); ?>">
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
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Booking Buyer Fees Options")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Config buyer fees for sauna')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group-item">
                        <label class="control-label"><?php echo e(__('Buyer Fees')); ?></label>
                        <div class="g-items-header">
                            <div class="row">
                                <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                                <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                                <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="g-items">
                            <?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
                            <?php if(!empty($settings['sauna_booking_buyer_fees'])): ?>
                                <?php $sauna_booking_buyer_fees = json_decode($settings['sauna_booking_buyer_fees'],true); ?>
                                <?php $__currentLoopData = $sauna_booking_buyer_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$buyer_fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                        <div class="g-lang">
                                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                                            <input type="text" name="sauna_booking_buyer_fees[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($buyer_fee['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                                                            <input type="text" name="sauna_booking_buyer_fees[<?php echo e($key); ?>][desc<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($buyer_fee['desc'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                        </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <input type="text" name="sauna_booking_buyer_fees[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($buyer_fee['name'] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                                                    <input type="text" name="sauna_booking_buyer_fees[<?php echo e($key); ?>][desc]" class="form-control" value="<?php echo e($buyer_fee['desc'] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" min="0" step="0.1"  name="sauna_booking_buyer_fees[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($buyer_fee['price']); ?>">
                                                <select name="sauna_booking_buyer_fees[<?php echo e($key); ?>][unit]" class="form-control">
                                                    <option <?php if( ($buyer_fee['unit'] ?? "") ==  'fixed'): ?> selected <?php endif; ?> value="fixed"><?php echo e(__("Fixed")); ?></option>
                                                    <option <?php if( ($buyer_fee['unit'] ?? "") ==  'percent'): ?> selected <?php endif; ?> value="percent"><?php echo e(__("Percent")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="sauna_booking_buyer_fees[<?php echo e($key); ?>][type]" class="form-control d-none">
                                                    <option <?php if($buyer_fee['type'] ==  'one_time'): ?> selected <?php endif; ?> value="one_time"><?php echo e(__("One-time")); ?></option>
                                                </select>
                                                <label>
                                                    <input type="checkbox" min="0" name="sauna_booking_buyer_fees[<?php echo e($key); ?>][per_ticket]" value="on" <?php if($buyer_fee['per_ticket'] ?? ''): ?> checked <?php endif; ?> >
                                                    <?php echo e(__("Price per ticket")); ?>

                                                </label>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="text-right">
                            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                        </div>
                        <div class="g-more hide">
                            <div class="item" data-number="__number__">
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                <div class="g-lang">
                                                    <div class="title-lang"><?php echo e($language->name); ?></div>
                                                    <input type="text" __name__="sauna_booking_buyer_fees[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Fee name')); ?>">
                                                    <input type="text" __name__="sauna_booking_buyer_fees[__number__][desc<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Fee desc')); ?>">
                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" __name__="sauna_booking_buyer_fees[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Fee name')); ?>">
                                            <input type="text" __name__="sauna_booking_buyer_fees[__number__][desc]" class="form-control" value="" placeholder="<?php echo e(__('Fee desc')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" min="0" step="0.1"  __name__="sauna_booking_buyer_fees[__number__][price]" class="form-control" value="">
                                        <select __name__="sauna_booking_buyer_fees[__number__][unit]" class="form-control">
                                            <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                            <option value="percent"><?php echo e(__("Percent")); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select __name__="sauna_booking_buyer_fees[__number__][type]" class="form-control d-none">
                                            <option value="one_time"><?php echo e(__("One-time")); ?></option>
                                        </select>
                                        <label>
                                            <input type="checkbox" min="0" __name__="sauna_booking_buyer_fees[__number__][per_ticket]" value="on">
                                            <?php echo e(__("Price per ticket")); ?>

                                        </label>
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
<?php endif; ?>
<?php if(is_default_lang()): ?>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Vendor Options")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Vendor config for sauna')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Sauna created by vendor must be approved by admin")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="sauna_vendor_create_service_must_approved_by_admin" value="1" <?php if(!empty($settings['sauna_vendor_create_service_must_approved_by_admin'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes please")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("ON: When vendor posts a service, it needs to be approved by administrator")); ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Allow vendor can change their booking status")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="sauna_allow_vendor_can_change_their_booking_status" value="1" <?php if(!empty($settings['sauna_allow_vendor_can_change_their_booking_status'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes please")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("ON: Vendor can change their booking status")); ?></small>
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
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Booking Deposit")); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Booking Deposit Options")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                    <label><input type="checkbox" name="sauna_deposit_enable" value="1" <?php if(setting_item('sauna_deposit_enable')): ?> checked <?php endif; ?> > <?php echo e(__('Yes, please enable it')); ?></label>
                    </div>
                </div>
                <div class="form-group" data-condition="sauna_deposit_enable:is(1)">
                    <label ><?php echo e(__('Deposit Amount')); ?></label>
                    <div class="form-controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="number" name="sauna_deposit_amount" class="form-control" step="0.1" value="<?php echo e(old('sauna_deposit_amount',setting_item('sauna_deposit_amount',0))); ?>" >
                                    <select name="sauna_deposit_type"  class="form-control">
                                        <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                        <option <?php if(old('sauna_deposit_type',setting_item('sauna_deposit_type')) == 'percent'): ?> selected <?php endif; ?> value="percent"><?php echo e(__("Percent")); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" data-condition="sauna_deposit_enable:is(1)">
                    <label class="" ><?php echo e(__("Deposit Fomular")); ?></label>
                    <div class="form-controls">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="sauna_deposit_fomular" class="form-control" >
                                    <option value="default" <?php echo e(($settings['sauna_deposit_fomular'] ?? '') == 'default' ? 'selected' : ''); ?>><?php echo e(__('Default')); ?></option>
                                    <option value="deposit_and_fee" <?php echo e(($settings['sauna_deposit_fomular'] ?? '') == 'deposit_and_fee' ? 'selected' : ''); ?>><?php echo e(__("Deposit amount + Buyer free")); ?></option>
                                </select>
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
        <h3 class="form-group-title"><?php echo e(__("Disable sauna module?")); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Disable sauna module")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                    <label><input type="checkbox" name="sauna_disable" value="1" <?php if(setting_item('sauna_disable')): ?> checked <?php endif; ?> > <?php echo e(__('Yes, please disable it')); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Sauna/Views/admin/settings/sauna.blade.php ENDPATH**/ ?>