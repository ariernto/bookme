@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/accommodation/css/accommodation.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')
    <div class="bravo_search_accommodation">
        <div class="bravo_banner" @if($bg = setting_item("accommodation_page_search_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif >
            <div class="container">
                <h1>
                    {{setting_item_with_lang("accommodation_page_search_title")}}
                </h1>
            </div>
        </div>
        <div class="bravo_form_search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @include('Accommodation::frontend.layouts.search.form-search')
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @include('Accommodation::frontend.layouts.search.list-item')
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/accommodation/js/accommodation.js?_ver='.config('app.version')) }}"></script>
@endsection