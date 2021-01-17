<form action="{{ route("activity.search") }}" class="form bravo_form" method="get" style="background: #00000020">
    <div class="g-field-search borderline">
        <div class="row">
            @php $activity_search_fields = setting_item_array('activity_search_fields');
            $activity_search_fields = array_values(\Illuminate\Support\Arr::sort($activity_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            @endphp
            {{-- @dd($activity_search_fields) --}}
            @if(!empty($activity_search_fields))
                @foreach($activity_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div class="col-md-{{ $field['size'] ?? "6"}} topspace">
                        @switch($field['field'])
                            @case ('activity_type')
                                @include('Activity::frontend.layouts.search.fields.activity_type')
                            @break
                            @case ('location')
                                @include('Activity::frontend.layouts.search.fields.location')
                            @break
                            @case ('date')
                                @include('Activity::frontend.layouts.search.fields.date')
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
<style>
    .tab-content::before{
        opacity: 0;
    }
    .borderline {
        border: 1px solid #3A2D48 !important;
        border-radius: 5px 0px 0px 5px !important;
    }
</style>
