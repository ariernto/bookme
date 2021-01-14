@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')
    <div class="bravo_search_tour">
        <div class="page-template-content">
            {!! $page->getProcessedContent() !!}
        </div>
        <div class="container" style="padding-top: 80px">
            @include('Page::frontend.layouts.search.list-item')
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
        <section>
            <div class="container sectionPadding">
                <h2 class="text-center">Destinations</h2>
                <p  class="text-center">Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. <br>Aenean massa cum sociis Theme natoque</p>
                <div class="row">
                    @include('Page::frontend.layouts.details.tour-itinerary')
                </div>
            </div>
        </section>

        <section class="sectionPadding">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div>
                            <p class="paraTop">Best Choice</p>
                            <h3 class="mb-0" style="font-weight: 700;">Why Choose </h3>
                            <h3 class="headBrown">Finland?</h3>
                            <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing.</p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                            <p><strong><a href="">Make your holiday Special</a></strong></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background-color: #F1F1F0;padding: 30px 25px">
                            <div class="sideWrap">
                                <div class="iconSideWrap"><i class="fa fa-shield"></i></div>
                                <h4>Cottages 10,000+ </h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the printing and typesetting industry.</p>
                            </div>

                            <div class="sideWrap" style="margin-top: 25px;">
                                <div class="iconSideWrap"><i class="fa fa-home"></i></div>
                                <h4>Trust and Safety</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<style>
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
@endsection

@section('footer')
    <script>
        $(document).ready(function(e) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                nav: true,
                navText: ['<span aria-label="Previous">‹</span>','<span aria-label="Next">›</span>'],
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/tour/js/tour.js?_ver='.config('app.version')) }}"></script>
@endsection
