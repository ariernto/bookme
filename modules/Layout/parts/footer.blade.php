@if(!is_api())

	<div class="bravo_footer">
		<div style="background-image: url({{asset('footerbackground.png')}})" class="main-footer"> {{-- style="background-image: url({{asset('2background.png')}})" --}}
			<div class="container">
                <div style="padding-top: 50px;padding-bottom: 50px" class="row">
                    <div class="col-lg-4">
                        <h2>BOOKME</h2>
                        <p>
                            <br/>
                            We aim to ensure that you never miss
                            an opportunity to travel.
                            <br/>
                        </p>
                        <h6>Follow Us</h6>
                        <button class="sharebtn"><i class="fa fa-google socialicon"></i></button>
                        <button class="sharebtn"><i class="fa fa-twitter socialicon"></i></button>
                        <button class="sharebtn"><i class="fa fa-facebook socialicon"></i></button>
                        <button class="sharebtn"><i class="fa fa-instagram socialicon"></i></button>
                        <button class="sharebtn"><i class="fa fa-linkedin socialicon"></i></button>
                        <p class="subscribetext">Subscribe to Our Newsletter</p>
                        <div class="fullwidth disflex">
                            <input class="form-control col-lg-10 emailinput" placeholder="Enter Your Email Address"/>
                            <button class="btn joinbtn">Join</button>
                        </div>
                    </div>
                    <div class="col-lg-7 row">
                        <div class="col-lg-4">
                            <h5 class="titlecha">SOLUTIONS</h5>
                            <p>
                                <a class="blackcha" href="#">Activities</a><br/>
                                <a class="blackcha" href="#">Attractions</a><br/>
                                <a class="blackcha" href="#">Entertainment</a><br/>
                                <a class="blackcha" href="#">Events & Festivals</a><br/>
                                <a class="blackcha" href="#">Food & Restaurants</a><br/>
                                <a class="blackcha" href="#">Outdoors</a><br/>
                                <a class="blackcha" href="#">Cottages</a><br/>
                                <a class="blackcha" href="#">Saunas</a>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="titlecha">EXPLORE</h5>
                            <p>
                                <a class="blackcha" href="#">Cottages Sitemap</a><br/>
                                <a class="blackcha" href="#">Saunas Sitemap</a><br/>
                                <a class="blackcha" href="#">Destinations Sitemap</a><br/>
                                <a class="blackcha" href="#">What to do in Finland</a><br/>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="titlecha">CONTACT</h5>
                            <p>
                                <a class="blackcha" href="#">Phone</a><br/>
                                <a class="blackcha" href="#">Contact us</a><br/>
                                <a class="blackcha" href="#">Become a supplier</a><br/>
                                <a class="blackcha" href="#">Submit your cottage</a><br/>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<div class="container context">
				<div class="row">
					<div class="col-md-12 text-center">
						Copyright © 2020 Bookme - All Rights Reserved
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

@include('Layout::parts.login-register-modal')
@include('Layout::parts.chat')
@if(Auth::id())
	@include('Media::browser')
@endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">

{!! \App\Helpers\Assets::css(true) !!}

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
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>
@if(Auth::id())
	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.version')) }}"></script>
@endif
<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/functions.js?_ver='.config('app.version')) }}"></script>

@if(setting_item('inbox_enable'))
	<script src="{{ asset('module/core/js/chat-engine.js?_ver='.config('app.version')) }}"></script>
@endif

@if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
)
	{!! App\Helpers\MapEngine::scripts() !!}
@endif

<script src="{{ asset('js/home.js?_ver='.config('app.version')) }}"></script>

@if(!empty($is_user_page))
	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api())
	<div class="booking_cookie_agreement p-3 d-flex fixed-bottom">
		<div class="content-cookie">{!! setting_item_with_lang('cookie_agreement_content') !!}</div>
		<button class="btn save-cookie">{!! setting_item_with_lang('cookie_agreement_button_text') !!}</button>
	</div>
	<script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
	</script>
	<script src="{{ asset('js/cookie.js?_ver='.config('app.version')) }}"></script>
@endif

{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
