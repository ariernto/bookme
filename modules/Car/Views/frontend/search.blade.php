@extends('layouts.app')

@section('head')

    <link href="{{ asset('dist/frontend/module/car/css/car.css?_ver='.config('app.version')) }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

@endsection

@section('content')

    <div class="bravo_search_car">

        <div class="bravo_banner" @if($bg = setting_item("car_page_search_banner")) style="background-image: url({{asset('media/preview/160.jpg')}});height: 50vh;margin-top: -97px;padding-top: 24vh;" @endif >

            <div class="container">

                <h1>

                    {{setting_item_with_lang("car_page_search_title")}}

                </h1>

            </div>

        </div>

        <div class="bravo_form_search">

            <div class="container"  style="position: relative;top: -14vh;">

                <div class="row">

                    <div class="col-lg-12 col-md-12">

                        @include('Car::frontend.layouts.search.form-search')

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

            @include('Car::frontend.layouts.search.list-item')

        </div>

    </div>

@endsection



@section('footer')

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset('module/car/js/car.js?_ver='.config('app.version')) }}"></script>

@endsection

