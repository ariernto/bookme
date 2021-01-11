
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e($row->id ? __('Edit: ').$row->title : __('Add new hotel')); ?>

        <?php if($row->id): ?>
            <div class="title-action">
                <a class="btn btn-info" href="<?php echo e(route('hotel.vendor.room.index',['hotel_id'=>$row->id])); ?>">
                    <i class="fa fa-hand-o-right"></i> <?php echo e(__("Manage Rooms")); ?>

                </a>
                <a href="<?php echo e(route('hotel.vendor.room.availability.index',['hotel_id'=>$row->id])); ?>" class="btn btn-warning">
                    <i class="fa fa-calendar"></i> <?php echo e(__("Availability Rooms")); ?>

                </a>
            </div>
        <?php endif; ?>
    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($row->id): ?>
        <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="lang-content-box">
        <form action="<?php echo e(route('hotel.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-add-service">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a data-toggle="tab" href="#nav-tour-content" aria-selected="true" class="active"><?php echo e(__("1. Content")); ?></a>
                    <a data-toggle="tab" href="#nav-tour-location" aria-selected="false"><?php echo e(__("2. Locations")); ?></a>
                    <?php if(is_default_lang()): ?>
                        <a data-toggle="tab" href="#nav-tour-pricing" aria-selected="false"><?php echo e(__("3. Pricing")); ?></a>
                        <a data-toggle="tab" href="#nav-attribute" aria-selected="false"><?php echo e(__("4. Attributes")); ?></a>

                    <?php endif; ?>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tour-content">
                        <?php echo $__env->make('Hotel::admin/hotel/content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(is_default_lang()): ?>
                            <div class="form-group">
                                <label><?php echo e(__("Featured Image")); ?></label>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tour-location">
                        <?php echo $__env->make('Hotel::admin/hotel/location',["is_smart_search"=>"1"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if(is_default_lang()): ?>
                        <div class="tab-pane fade" id="nav-tour-pricing">
                            <?php echo $__env->make('Hotel::admin/hotel/pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-attribute">
                            <?php echo $__env->make('Hotel::admin/hotel/attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Hotel/Views/frontend/vendorHotel/detail.blade.php ENDPATH**/ ?>