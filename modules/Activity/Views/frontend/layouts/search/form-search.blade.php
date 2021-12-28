<form action="{{ route("activity.search") }}" class="form bravo_form" method="get" style="background: none">
    <div class="g-field-search" style="background: none">
        <div class="row" style="background: none">
            @php $activity_search_fields = setting_item_array('activity_search_fields');
            $activity_search_fields = array_values(\Illuminate\Support\Arr::sort($activity_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            @endphp
            {{-- @dd($activity_search_fields) --}}
            @if(!empty($activity_search_fields))
                @foreach($activity_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div class="col-md-{{ $field['size'] ?? "6" }}">
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
</style>