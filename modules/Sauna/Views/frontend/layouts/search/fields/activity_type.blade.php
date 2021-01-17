@php($location_search_style = setting_item('tour_location_search_style'))
		@if($location_search_style=='autocompletePlace')
		<div class="g-map-place" >
            <input type="text" name="map_place" placeholder="{{__("Sauna Type")}}"  value="{{request()->input('map_place')}}" class="form-control searchinput border-0">
            <div class="map d-none" id="map-{{\Illuminate\Support\Str::random(10)}}"></div>
            <input type="hidden" name="map_lat" value="{{request()->input('map_lat')}}">
            <input type="hidden" name="map_lgn" value="{{request()->input('map_lgn')}}">
        </div>

		@else
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
            // $traverse($tour_location);
            ?>
			<div class="smart-search">
                <div style="
                border-right: 1px solid black;
                height: 25px;
                position: absolute;
                margin-top: 6px;
                width: 100%;
                right: 40px;
                z-index: 2;
                "></div>
				<input type="text" class="smart-search-location parent_text form-control searchinput" {{ ( empty(setting_item("tour_location_search_style")) or setting_item("tour_location_search_style") == "normal" ) ? "readonly" : ""  }} placeholder="{{__("Sauna type")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
				       data-default="{{ json_encode($list_json) }}">
				<input type="hidden" class="child_id" name="location_id" value="{{Request::query('location_id')}}">
			</div>
		@endif

<style>
    .smart-search-location::placeholder {
        color: black !important;
        padding-left: 10px;
    }
    .smart-search:after {
        color: black !important;
    }
</style>
