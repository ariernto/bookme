<?php ($location_search_style = setting_item('tour_location_search_style')); ?>
<div class="form-group">
	<i class="field-icon fa icofont-map"></i>
	<div class="form-content">
		<label><?php echo e($field['title'] ?? ""); ?></label>
		<?php if($location_search_style=='autocompletePlace'): ?>
		<div class="g-map-place" >
            <input type="text" name="map_place" placeholder="<?php echo e(__("Where are you going?")); ?>"  value="<?php echo e(request()->input('map_place')); ?>" class="form-control border-0">
            <div class="map d-none" id="map-<?php echo e(\Illuminate\Support\Str::random(10)); ?>"></div>
            <input type="hidden" name="map_lat" value="<?php echo e(request()->input('map_lat')); ?>">
            <input type="hidden" name="map_lgn" value="<?php echo e(request()->input('map_lgn')); ?>">
        </div>
		
		<?php else: ?>
            <?php
            $location_name = "";
            $list_json = [];
            $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name) {
                foreach ($locations as $location) {
                    $translate = $location->translateOrOrigin(app()->getLocale());
                    if (Request::query('location_id') == $location->id) {
                        $location_name = $translate->name;
                    }
                    $list_json[] = [
                        'id'    => $location->id,
                        'title' => $prefix.' '.$translate->name,
                    ];
                    $traverse($location->children, $prefix.'-');
                }
            };
            $traverse($tour_location);
            ?>
			<div class="smart-search">
				<input type="text" class="smart-search-location parent_text form-control" <?php echo e(( empty(setting_item("tour_location_search_style")) or setting_item("tour_location_search_style") == "normal" ) ? "readonly" : ""); ?> placeholder="<?php echo e(__("Where are you going?")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
				       data-default="<?php echo e(json_encode($list_json)); ?>">
				<input type="hidden" class="child_id" name="location_id" value="<?php echo e(Request::query('location_id')); ?>">
			</div>
		<?php endif; ?>
	</div>
</div><?php /**PATH D:\Web\Laravel\VarghaJob\bookme\modules/Tour/Views/frontend/layouts/search/fields/location.blade.php ENDPATH**/ ?>