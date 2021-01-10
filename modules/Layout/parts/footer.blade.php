@if(!is_api())
	<div class="bravo_footer">
		<div class="mailchimp">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-10 col-lg-offset-1">
						<div class="row">
							<div class="col-xs-12  col-md-7 col-lg-6">
								<div class="media ">
									<div class="media-left hidden-xs">
										<i class="icofont-island-alt"></i>
									</div>
									<div class="media-body">
										<h4 class="media-heading">{{__("Get Updates & More")}}</h4>
										<p>{{__("Thoughtful thoughts to your inbox")}}</p>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-5 col-lg-6">
								<form action="{{route('newsletter.subscribe')}}" class="subcribe-form bravo-subscribe-form bravo-form">
									@csrf
									<div class="form-group">
										<input type="text" name="email" class="form-control email-input" placeholder="{{__('Your Email')}}">
										<button type="submit" class="btn-submit">{{__('Subscribe')}}
											<i class="fa fa-spinner fa-pulse fa-fw"></i>
										</button>
									</div>
									<div class="form-mess"></div>
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-footer">
			<div class="container">
				<div class="row">
					@if($list_widget_footers = setting_item_with_lang("list_widget_footer"))
                        <?php $list_widget_footers = json_decode($list_widget_footers); ?>
						@foreach($list_widget_footers as $key=>$item)
							<div class="col-lg-{{$item->size ?? '3'}} col-md-6">
								<div class="nav-footer">
									<div class="title">
										{{$item->title}}
									</div>
									<div class="context">
										{!! $item->content  !!}
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="copy-right">
			<div class="container context">
				<div class="row">
					<div class="col-md-12">
						{!! setting_item_with_lang("footer_text_left") ?? ''  !!}
						<div class="f-visa">
							{!! setting_item_with_lang("footer_text_right") ?? ''  !!}
						</div>
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
