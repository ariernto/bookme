@php($location_search_style = setting_item('tour_location_search_style'))
<div class="filter-item">
    <div class="form-group">
        <i class="field-icon fa icofont-map"></i>
        <div class="form-content">
            @if($location_search_style=='autocompletePlace')
                <div class="g-map-place">
                    <input type="text" name="map_place" placeholder="{{__("Where are you going?")}}"
                           value="{{request()->input('map_place')}}" class="form-control border-0">
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
                        if (request()->query('location_id') == $location->id) {
                            $location_name = $translate->name;
                        }
                        $list_json[] = [
                            'id' => $location->id,
                            'title' => $prefix . ' ' . $translate->name,
                        ];
                        $traverse($location->children, $prefix . '-');
                    }
                };
                $traverse($tour_location);
                ?>
                <div class="smart-search">
                    <input type="text" class="smart-search-location parent_text form-control"
                           {{ ( empty(setting_item("tour_location_search_style")) or setting_item("tour_location_search_style") == "normal" ) ? "readonly" : ""  }} placeholder="{{__("Where are you going?")}}"
                           value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                           data-default="{{ json_encode($list_json) }}">
                    <input type="hidden" class="child_id" name="location_id" value="{{Request::query('location_id')}}">
                </div>
            @endif
        </div>
    </div>
</div>
