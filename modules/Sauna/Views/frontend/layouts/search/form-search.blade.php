<form action="{{ route("sauna.search") }}" class="form bravo_form backtransparent" method="get">
    <div class="g-field-search borderline">
        <div class="row">
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Sauna::frontend.layouts.search.fields.location')
            </div>
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Sauna::frontend.layouts.search.fields.activity_type')
            </div>
            <div class="col-lg-4 col-md-4 border-right topspace">
                @include('Sauna::frontend.layouts.search.fields.date')
            </div>

            {{-- @php $sauna_search_fields = setting_item_array('sauna_search_fields');

            $sauna_search_fields = array_values(\Illuminate\Support\Arr::sort($sauna_search_fields, function ($value) {

                return $value['position'] ?? 0;

            }));

            @endphp

            @if(!empty($sauna_search_fields))

                @foreach($sauna_search_fields as $field)

                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp

                    <div class="col-md-{{ $field['size'] ?? "6" }} border-right topspace">

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

            @endif --}}

        </div>
    </div>
    <div class="g-button-submit">
        <button class="btn btn-primary btn-search" type="submit">{{__("Search")}}</button>
    </div>
</form>
<style>
    .borderline {
        border: 1px solid #3A2D48 !important;
        border-radius: 5px 0px 0px 5px !important;
    }
</style>
