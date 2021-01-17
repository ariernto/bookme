@extends('layouts.app')

@section('head')

    <link href="{{ asset('dist/frontend/module/sauna/css/sauna.css?_ver='.config('app.version')) }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

@endsection

@section('content')

    <div class="bravo_search_sauna">

        <div class="bravo_banner" style="background: #110122;height: 50vh;margin-top: -97px;padding-top: 24vh;background-position: 50%;background-repeat: no-repeat;background-size: cover" >

            <div class="container">

                <h1 class="whitefont">

                    Search for sauna

                </h1>

            </div>

        </div>

        <div class="bravo_form_search">

            <div class="container"  style="position: relative;top: -11vh;">

                <div class="row">

                    <div class="col-lg-12 col-md-12">

                        @include('Sauna::frontend.layouts.search.form-search')

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

            @include('Sauna::frontend.layouts.search.list-item')

        </div>

    </div>

@endsection



@section('footer')

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset('module/sauna/js/sauna.js?_ver='.config('app.version')) }}"></script>

@endsection

