
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e($row->id ? __('Edit: ').$row->title : __('Add new tour')); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($row->id): ?>
        <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="lang-content-box">
        <form action="<?php echo e(route('tour.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-add-service">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a data-toggle="tab" href="#nav-tour-content" aria-selected="true" class="active"><?php echo e(__("1. Content")); ?></a>
                    <a data-toggle="tab" href="#nav-tour-location" aria-selected="false"><?php echo e(__("2. Locations")); ?></a>
                    <?php if(is_default_lang()): ?>
                        <a data-toggle="tab" href="#nav-tour-pricing" aria-selected="false"><?php echo e(__("3. Pricing")); ?></a>
                        <a data-toggle="tab" href="#nav-availability" aria-selected="false"><?php echo e(__("4. Availability")); ?></a>
                        <a data-toggle="tab" href="#nav-attribute" aria-selected="false"><?php echo e(__("5. Attributes")); ?></a>
                        <a data-toggle="tab" href="#nav-ical" aria-selected="false"><?php echo e(__("6. Ical")); ?></a>
                    <?php endif; ?>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tour-content">
                        <?php echo $__env->make('Tour::admin/tour/tour-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(is_default_lang()): ?>
                            <div class="form-group">
                                <label><?php echo e(__("Featured Image")); ?></label>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tour-location">
                        <?php echo $__env->make('Tour::admin/tour/tour-location',["is_smart_search"=>"1"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if(is_default_lang()): ?>
                        <div class="tab-pane fade" id="nav-tour-pricing">
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__('Default State')); ?></strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="default_state" class="custom-select">
                                                    <option value=""><?php echo e(__('-- Please select --')); ?></option>
                                                    <option value="1" <?php if(old('default_state',$row->default_state ?? 0) == 1): ?> selected <?php endif; ?>><?php echo e(__("Always available")); ?></option>
                                                    <option value="0" <?php if(old('default_state',$row->default_state ?? 0) == 0): ?> selected <?php endif; ?>><?php echo e(__("Only available on specific dates")); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->make('Tour::admin/tour/pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-availability">
                            <?php echo $__env->make('Tour::admin/tour/availability', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-attribute">
                            <?php echo $__env->make('Tour::admin/tour/attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-ical">
                            <?php echo $__env->make('Tour::admin/tour/ical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('libs/tinymce/js/tinymce/tinymce.min.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('js/condition.js?_ver='.config('app.version'))); ?>"></script>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                fitBounds: true,
                center: [<?php echo e($row->map_lat ?? "51.505"); ?>, <?php echo e($row->map_lng ?? "-0.09"); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    <?php if($row->map_lat && $row->map_lng): ?>
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
                        icon_options: {}
                    });
                    <?php endif; ?>
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Tour/Views/frontend/manageTour/detail.blade.php ENDPATH**/ ?>