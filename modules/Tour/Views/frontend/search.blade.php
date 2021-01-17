@extends('layouts.app')

@section('head')

    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

@endsection

@section('content')

    <div class="bravo_search_tour">

        <div class="bravo_banner" @if($bg = setting_item("tour_page_search_banner")) style="background: #110122;height: 50vh;margin-top: -97px;padding-top: 24vh;" @endif >

            <div class="container">

                <h1 class="whitefont maxwid">

                    Search for tour

                </h1>

            </div>

        </div>

        <div class="bravo_form_search" >

            <div class="container" style="position: relative;top: -11vh;">

                <div class="row maxwid">

                    <div class="col-lg-12 col-md-12">
                        <div class="borderline">
                            @include('Tour::frontend.layouts.search.form-search')
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

            @include('Tour::frontend.layouts.search.list-item')

        </div>
        <section class="topImgOverSection">
            <div class="container textOverImgRight">
                <img src="http://test.booking.dorica.fi/uploads/demo/tour/banner-search.jpg">
                <div class="bottom-rightTop">
                    <p>Helsinki to Stockholm <span style="color: #C29D59;">from 34$</span></p>
                    <button class="btn">Book Now</button>
                </div>
                <div class="centeredTop"><i class="fa fa-play" aria-hidden="true"></i></div>
            </div>
        </section>
    </div>

@endsection


<style>
    @media (min-width: 1500px)
    {
        .maxwid {
            max-width: 1140px !important;
        }
    }
    @media (min-width: 992px)
    {
        .maxwid {
            max-width: 960px;
        }
    }
    .maxwid {
        margin-left: auto !important;
        margin-right: auto !important;
    }
    .nav.nav-tabs>li>a{
        background-color:none!important;
    }
    .topImgOverSection{
        padding: 80px 50px;
        background-color: #F7F7F7;
    }
    .container.textOverImgRight {
        position: relative;
        text-align: center;
        color: white;
    }
    .container.textOverImgRight img{
        width:100%;height: 500px;object-fit: cover;
    }
    .textOverImgRight .bottom-rightTop {
        position: absolute;
        bottom: 15px;
        right: 28px;
        padding: 20px 50px;
        background-color: #fff;
        text-align: left;
    }
    .textOverImgRight .centeredTop{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .textOverImgRight .bottom-rightTop p{
        color: #000;
        font-size: 17px;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
    }
    .textOverImgRight .bottom-rightTop .btn{
        background-color: #C29D59;color: #fff;font-size: 12px;border-radius: 0;padding: 5px 13px;
    }
    .textOverImgRight .centeredTop i{
        font-size: 55px;
    }
    .sliderWrap {
        position: relative;
        text-align: center;
        color: white;
    }
    .sliderWrap .centered{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-transform: uppercase;
        font-size: 24px;
        font-weight: 500;
        padding-top: 130px;
        width:100%;height: 300px;background-color: rgba(0,0,0,0.1);
    }
    .sliderWrap img{
        width:100%;height: 300px;object-fit: cover;
    }
    .headBrown{
        position: relative;
        font-weight: 700;color: #C29D59
    }
    .headBrown:before{
        content: "";
        left: 0px;
        right: 0;
        bottom: -13px;
        background-color: #C29D59;
        width: 95px;
        height: 1px;
        position: absolute;
    }
    .sectionPadding{
        padding: 50px 0 100px;
        }
        .paraTop{
        margin-bottom: 2px;color: #C29D59;
        }
        .iconSideWrap{
        width: 36px;height: 36px;background-color: #C29D59;text-align: center;border-radius: 50%;padding-top: 4px;font-size: 20px;color: #fff;
        }
        .sideWrap h4{
        font-size: 15px;margin-top: 7px;
        }
        .sideWrap p{
        font-size: 13px;
        }
    </style>

@section('footer')

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset('module/tour/js/tour.js?_ver='.config('app.version')) }}"></script>

@endsection
