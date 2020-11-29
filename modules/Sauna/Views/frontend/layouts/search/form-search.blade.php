<form action="{{ route("sauna.search") }}" class="form bravo_form" method="get">
    <div class="g-field-search">
        <div class="row">
            @php $sauna_search_fields = setting_item_array('sauna_search_fields');
            $sauna_search_fields = array_values(\Illuminate\Support\Arr::sort($sauna_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            @endphp
            @if(!empty($sauna_search_fields))
                @foreach($sauna_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div class="col-md-{{ $field['size'] ?? "6" }} border-right">
                        @switch($field['field'])
                            @case ('service_name')
                            @include('Sauna::frontend.layouts.search.fields.service_name')
                            @break
                            @case ('location')
                            @include('Sauna::frontend.layouts.search.fields.location')
                            @break
                            @case ('date')
                            @include('Sauna::frontend.layouts.search.fields.date')
                            @break
                        @endswitch
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="g-button-submit">
        <button class="btn btn-primary btn-search" type="submit">{{__("Search")}}</button>
    </div>
</form>
