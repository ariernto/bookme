<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Site Information")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Information of your website for customer and goole')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class=""><?php echo e(__("Site title")); ?></label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="site_title" value="<?php echo e(setting_item_with_lang('site_title',request()->query('lang'))); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Site Desc")); ?></label>
                    <div class="form-controls">
                        <textarea name="site_desc" class="form-control" cols="30" rows="7"><?php echo e(setting_item_with_lang('site_desc',request()->query('lang'))); ?></textarea>
                    </div>
                </div>

                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Favicon")); ?></label>
                    <div class="form-controls form-group-image">
                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('site_favicon',$settings['site_favicon'] ?? ""); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Date format")); ?></label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="date_format" value="<?php echo e($settings['date_format'] ?? 'm/d/Y'); ?>">
                    </div>
                </div>
                <?php endif; ?>
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label><?php echo e(__("Timezone")); ?></label>
                    <?php
                        $path = resource_path('module/core/timezone.json');
                        $timezones = json_decode(\Illuminate\Support\Facades\File::get($path));
                    ?>
                    <div class="form-controls">
                        <select name="site_timezone" class="form-control">
                            <option value="UTC"><?php echo e(__("-- Default --")); ?></option>
                            <?php if(!empty($timezones)): ?>
                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($item == ($settings['site_timezone'] ?? '') ): ?> selected <?php endif; ?> value="<?php echo e($item); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label><?php echo e(__("Change the first day of week for the calendars")); ?></label>
                    <div class="form-controls">
                        <select name="site_first_day_of_the_weekin_calendar" class="form-control">
                            <option <?php if("1" == ($settings['site_first_day_of_the_weekin_calendar'] ?? '') ): ?> selected <?php endif; ?> value="1"><?php echo e(__("Monday")); ?></option>
                            <option <?php if("0" == ($settings['site_first_day_of_the_weekin_calendar'] ?? '') ): ?> selected <?php endif; ?> value="0"><?php echo e(__("Sunday")); ?></option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Language')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change language of your websites')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__("Select default language")); ?></label>
                        <div class="form-controls">
                            <select name="site_locale" class="form-control">
                                <option value=""><?php echo e(__("-- Default --")); ?></option>
                                <?php
                                    $langs = \Modules\Language\Models\Language::getActive();
                                ?>

                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($lang->locale == ($settings['site_locale'] ?? '') ): ?> selected <?php endif; ?> value="<?php echo e($lang->locale); ?>"><?php echo e($lang->name); ?> - (<?php echo e($lang->locale); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <p><i><a href="<?php echo e(url('admin/module/language')); ?>"><?php echo e(__("Manage languages here")); ?></a></i></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("Enable Multi Languages")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" <?php if(setting_item('site_enable_multi_lang') ?? '' == 1): ?> checked <?php endif; ?> name="site_enable_multi_lang" value="1"><?php echo e(__('Enable')); ?></label>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label><?php echo e(__("Enable RTL")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" <?php if(setting_item_with_lang('enable_rtl',request()->query('lang')) ?? '' == 1): ?> checked <?php endif; ?> name="enable_rtl" value="1"><?php echo e(__('Enable')); ?></label>
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
            <h3 class="form-group-title"><?php echo e(__('Contact Information')); ?></h3>
            <p class="form-group-desc"><?php echo e(__('How your customer can contact to you')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo e(__("Admin Email")); ?></label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="admin_email" value="<?php echo e($settings['admin_email'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("Email Form Name")); ?></label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_from_name" value="<?php echo e($settings['email_from_name'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("Email Form Address")); ?></label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="email_from_address" value="<?php echo e($settings['email_from_address'] ?? ''); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__('Homepage')); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Change your homepage content')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo e(__("Page for Homepage")); ?></label>
                        <div class="form-controls">
                            <?php
                            $template = !empty($settings['home_page_id']) ? \Modules\Page\Models\Page::find($settings['home_page_id']) : false;

                            \App\Helpers\AdminForm::select2('home_page_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url'      => url('/admin/module/page/getForSelect2'),
                                        'dataType' => 'json'
                                    ]
                                ]
                            ],
                                !empty($template->id) ? [$template->id, $template->title] : false
                            )
                            ?>
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
        <h3 class="form-group-title"><?php echo e(__('Header & Footer Settings')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your options')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label><?php echo e(__("Logo")); ?></label>
                    <div class="form-controls form-group-image">
                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('logo_id',$settings['logo_id'] ?? ''); ?>
                    </div>
                </div>
                <?php endif; ?>
                    <div class="form-group">
                        <label><?php echo e(__("Topbar Left Text")); ?></label>
                        <div class="form-controls">
                            <div id="topbar_left_text_editor" class="ace-editor" style="height: 400px" data-theme="textmate" data-mod="html"><?php echo e(setting_item_with_lang('topbar_left_text',request()->query('lang'))); ?></div>
                            <textarea class="d-none" name="topbar_left_text" > <?php echo e(setting_item_with_lang('topbar_left_text',request()->query('lang'))); ?> </textarea>
                        </div>
                    </div>
                <div class="form-group">
                    <label><?php echo e(__("Footer List Widget")); ?></label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-3"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-2"><?php echo e(__('Size')); ?></div>
                                        <div class="col-md-6"><?php echo e(__('Content')); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $social_share = setting_item_with_lang('list_widget_footer',request()->query('lang'));
                                    if(!empty($social_share)) $social_share = json_decode($social_share,true);
                                    if(empty($social_share) or !is_array($social_share))
                                        $social_share = [];
                                    ?>
                                    <?php $__currentLoopData = $social_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="list_widget_footer[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item['title']); ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="list_widget_footer[<?php echo e($key); ?>][size]">
                                                        <option <?php if(!empty($item['size']) && $item['size']=='3'): ?> selected <?php endif; ?> value="3">1/4</option>
                                                        <option <?php if(!empty($item['size']) && $item['size']=='4'): ?> selected <?php endif; ?> value="4">1/3</option>
                                                        <option <?php if(!empty($item['size']) && $item['size']=='6'): ?> selected <?php endif; ?> value="6">1/2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea name="list_widget_footer[<?php echo e($key); ?>][content]" rows="5" class="form-control"><?php echo e($item['content']); ?></textarea>
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
                                                <input type="text" __name__="list_widget_footer[__number__][title]" class="form-control" value="">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" __name__="list_widget_footer[__number__][size]">
                                                    <option value="3">1/4</option>
                                                    <option value="4">1/3</option>
                                                    <option value="6">1/2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea __name__="list_widget_footer[__number__][content]" class="form-control" rows="5"></textarea>
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
                <div class="form-group">
                    <label><?php echo e(__("Footer Text Left")); ?></label>
                    <div class="form-controls">
                        <textarea name="footer_text_left" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('footer_text_left',request()->query('lang'))); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Footer Text Right")); ?></label>
                    <div class="form-controls">
                        <textarea name="footer_text_right" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('footer_text_right',request()->query('lang'))); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Page contact settings")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Settings for contact page')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class=""><?php echo e(__("Contact title")); ?></label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="page_contact_title" value="<?php echo e(setting_item_with_lang('page_contact_title',request()->query('lang'),"We'd love to hear from you")); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Contact sub title")); ?></label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="page_contact_sub_title" value="<?php echo e(setting_item_with_lang('page_contact_sub_title',request()->query('lang'),"Send us a message and we'll respond as soon as possible")); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Contact Desc")); ?></label>
                    <div class="form-controls">
                        <textarea name="page_contact_desc" class="d-none has-ckeditor" cols="30" rows="7"><?php echo e(setting_item_with_lang('page_contact_desc',request()->query('lang'),'<p>Tell. + 00 222 444 33</p>
<p>Email. hello@yoursite.com</p>
<p class="address">1355 Market St, Suite 900San, Francisco, CA 94103 United States</p>
<p>            <!--<p>Tell. + 00 222 444 33</p>
            <p>Email. hello@yoursite.com</p>
            <p class="address">1355 Market St, Suite 900San, Francisco, CA 94103 United States</p>-->
        </p>')); ?></textarea>
                    </div>
                </div>
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__("Contact Featured Image")); ?></label>
                        <div class="form-controls form-group-image">
                            <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('page_contact_image',setting_item('page_contact_image')); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('script.body'); ?>
    <script src="<?php echo e(asset('libs/ace/src-min-noconflict/ace.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script>
        (function ($) {
            $('.ace-editor').each(function () {
                var editor = ace.edit($(this).attr('id'));
                editor.setTheme("ace/theme/"+$(this).data('theme'));
                editor.session.setMode("ace/mode/"+$(this).data('mod'));
                var me = $(this);

                editor.session.on('change', function(delta) {
                    // delta.start, delta.end, delta.lines, delta.action
                    me.next('textarea').val(editor.getValue());
                });
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?><?php /**PATH D:\Web\Laravel\newpro\package\modules/Core/Views/admin/settings/groups/general.blade.php ENDPATH**/ ?>