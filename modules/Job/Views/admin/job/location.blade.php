<div class="panel">
    <div class="panel-title"><strong>{{__("Locations")}}</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Location")}}</label>
                @if(!empty($is_smart_search))
                    <div class="form-group-smart-search">
                        <div class="form-content">
                            <?php
                            $location_name = "";
                            $list_json = [];
                            $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name,$row) {
                                foreach ($locations as $location) {
                                    $translate = $location->translateOrOrigin(app()->getLocale());
                                    if ($row->location_id == $location->id){
                                        $location_name = $translate->name;
                                    }
                                    $list_json[] = [
                                        'id' => $location->id,
                                        'title' => $prefix . ' ' . $translate->name,
                                    ];
                                    $traverse($location->children, $prefix . '-');
                                }
                            };
                            $traverse($hotel_location);
                            ?>
                            <div class="smart-search">
                                <input type="text" class="smart-search-location parent_text form-control" placeholder="{{__("-- Please Select --")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                                       data-default="{{ json_encode($list_json) }}">
                                <input type="hidden" class="child_id" name="location_id" value="{{$row->location_id ?? Request::query('location_id')}}">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="">
                        <select name="location_id" class="form-control">
                            <option value="">{{__("-- Please Select --")}}</option>
                            <?php
                            $traverse = function ($locations, $prefix = '') use (&$traverse, $row) {
                                foreach ($locations as $location) {
                                    $selected = '';
                                    if ($row->location_id == $location->id)
                                        $selected = 'selected';
                                    printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                    $traverse($location->children, $prefix . '-');
                                }
                            };
                            $traverse($hotel_location);
                            ?>
                        </select>
                    </div>
                @endif
            </div>
        @endif
        <div class="form-group">
            <label class="control-label">{{__("Real address")}}</label>
            <input type="text" name="address" id="customPlaceAddress" class="form-control" placeholder="{{__("Real address")}}" value="{{$translation->address}}">
        </div>
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("The geographic coordinate")}}</label>
                <div class="control-map-group">
                    <div id="map_content"></div>
                    <input type="text" placeholder="{{__("Search by name...")}}" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                    <div class="g-control">
                        <div class="form-group">
                            <label>{{__("Map Latitude")}}:</label>
                            <input type="text" name="map_lat" class="form-control" value="{{$row->map_lat}}" onkeydown="return event.key !== 'Enter';">
                        </div>
                        <div class="form-group">
                            <label>{{__("Map Longitude")}}:</label>
                            <input type="text" name="map_lng" class="form-control" value="{{$row->map_lng}}" onkeydown="return event.key !== 'Enter';">
                        </div>
                        <div class="form-group">
                            <label>{{__("Map Zoom")}}:</label>
                            <input type="text" name="map_zoom" class="form-control" value="{{$row->map_zoom ?? "8"}}" onkeydown="return event.key !== 'Enter';">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>