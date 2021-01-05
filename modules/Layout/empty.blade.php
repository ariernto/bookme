<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}" />
        @else:
        <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />
        @endif
    @endif
    @include('Layout::parts.seo-meta')
    <link href="{{ asset('libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600' type='text/css' media='all' />
    <script>
        var bookingCore = {
            url:'{{url('/')}}',
            booking_decimals:{{(int)setting_item('currency_no_decimal',2)}},
            thousand_separator:'{{setting_item('currency_thousand')}}',
            decimal_separator:'{{setting_item('currency_decimal')}}',
            currency_position:'{{setting_item('currency_format')}}',
            currency_symbol:'{{currency_symbol()}}',
            date_format:'{{get_moment_date_format()}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
        };
    </script>
    <!-- Styles -->
    @yield('head')
    {{--Custom Style--}}
    <link href="{{ route('core.style.customCss') }}" rel="stylesheet">
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('css/rtl.css') }}" rel="stylesheet">
    @endif
</head>
<body class="{{$body_class ?? ''}}">
    <div class="bravo_wrap">
        @yield('content')
    </div>
    {{--Lazy Load--}}
    <script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
    <script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
    <script>
        // Set the options to make LazyLoad self-initialize
        window.lazyLoadOptions = {
            elements_selector: ".lazy",
            // ... more custom settings?
        };
        // Listen to the initialization event and get the instance of LazyLoad
        window.addEventListener('LazyLoad::Initialized', function (event) {
            window.lazyLoadInstance = event.detail.instance;
        }, false);
    </script>
    <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('libs/vue/vue.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @if(Auth::id())
        <script src="{{ asset('module/media/js/browser.js') }}"></script>
    @endif
    <script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    @yield('footer')
    @php \App\Helpers\ReCaptchaEngine::scripts() @endphp
</body>
</html>
