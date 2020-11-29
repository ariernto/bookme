<form action="{{url( app_get_locale(false,false,'/').env('SAUNA_ROUTE_PREFIX','sauna') )}}" class="form bravo_form d-flex justify-content-start" method="get" onsubmit="return false;">
    @php $sauna_map_search_fields = setting_item_array('sauna_map_search_fields');

    $sauna_map_search_fields = array_values(\Illuminate\Support\Arr::sort($sauna_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));

    @endphp
    @if(!empty($sauna_map_search_fields))
        @foreach($sauna_map_search_fields as $field)
            @switch($field['field'])
                @case ('location')
                    @include('Sauna::frontend.layouts.search-map.fields.location')
                @break
                @case ('attr')
                    @include('Sauna::frontend.layouts.search-map.fields.attr')
                @break
                @case ('date')
                    @include('Sauna::frontend.layouts.search-map.fields.date')
                @break
                @case ('price')
                    @include('Sauna::frontend.layouts.search-map.fields.price')
                @break
                @case ('advance')
                    <div class="filter-item filter-simple">
                        <div class="form-group">
                            <span class="filter-title toggle-advance-filter" data-target="#advance_filters">{{__('More filters')}} <i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                @break

            @endswitch
        @endforeach
    @endif



</form>
