<form action="{{ route("tour.search") }}" class="form bravo_form backtransparent" method="get">
    <div class="g-field-search">
        <div class="row">
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Tour::frontend.layouts.search.fields.location')
            </div>
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Tour::frontend.layouts.search.fields.activity_type')
            </div>
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Tour::frontend.layouts.search.fields.date')
            </div>
            {{-- @php $tour_search_fields = setting_item_array('tour_search_fields');

            $tour_search_fields = array_values(\Illuminate\Support\Arr::sort($tour_search_fields, function ($value) {

                return $value['position'] ?? 0;

            }));

            @endphp

            @if(!empty($tour_search_fields))

                @foreach($tour_search_fields as $field)

                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp

                    <div class="col-md-{{ $field['size'] ?? "6" }} border-right topspace">

                        @switch($field['field'])

                            @case ('service_name')

                                @include('Tour::frontend.layouts.search.fields.service_name')

                            @break

                            @case ('location')

                                @include('Tour::frontend.layouts.search.fields.location')

                            @break

                            @case ('date')

                                @include('Tour::frontend.layouts.search.fields.date')

                            @break

                        @endswitch

                    </div>

                @endforeach

            @endif --}}
        </div>
    </div>
    <div class="g-button-submit">
        <button class="btn btn-primary btn-search" type="submit">{{__("Search")}}</button>
    </div>
</form>
<style>
    .topspace {
        padding-top: 20px;
    }
    .transbackground {
        background: transparent !important;
        box-shadow: 1px 1px 3px 3px rgba(0,0,0,0.5) !important;
    }
</style>
