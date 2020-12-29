@section('head')
    <link href="{{ asset('module/vendor/css/vendor-register.css?_ver='.config('app.version')) }}" rel="stylesheet">
@endsection
<div class="container">
    <div class="bravo-vendor-form-register py-5 @if(!empty($layout)) {{ $layout }} @endif">
        <div class="row">
            <div class="col-12 col-lg-5">
                <h1>{{$title}}</h1>
                <p class="sub-heading">{{$desc}}</p>
                <form class="form bravo-form-register-vendor" method="post" action="{{route('vendor.register')}}">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" autocomplete="off" placeholder="{{__("First Name")}}">
                        <span class="invalid-feedback error error-first_name"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" autocomplete="off" placeholder="{{__("Last Name")}}">
                        <span class="invalid-feedback error error-last_name"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="business_name" autocomplete="off" placeholder="{{__("Business Name")}}">
                        <span class="invalid-feedback error error-business_name"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="{{__("Phone")}}">
                        <span class="invalid-feedback error error-phone"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="{{__("Email")}}">
                        <span class="invalid-feedback error error-email"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" autocomplete="off" placeholder="{{__("Password")}}">
                        <span class="invalid-feedback error error-password"></span>
                    </div>
                    <div class="form-group">
                        <label for="term">
                            <input id="term" type="checkbox" name="term" class="mr5">
                            {!! __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('vendor_term_conditions'))]) !!}
                            <span class="checkmark fcheckbox"></span>
                        </label>
                        <div><span class="invalid-feedback error error-term"></span></div>
                    </div>
                    @if(setting_item("user_enable_register_recaptcha"))
                        <div class="form-group">
                            {{recaptcha_field($captcha_action ?? 'register_vendor')}}
                            <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
                        </div><!--End form-group-->
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-submit">
                            {{ __('Sign Up') }}
                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true" style="display: none"></span>
                        </button>
                    </div>
                    <div class="message-error"></div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-lg-6">
                <div class="bravo_gallery">
                    <div class="btn-group">
                        <span class="btn-transparent has-icon bravo-video-popup" @if(!empty($youtube)) data-toggle="modal" @endif data-src="{{ handleVideoUrl($youtube) }}" data-target="#video-register">
                            @if($bg_image)
                                <img src="{{get_file_url($bg_image,'full')}}" class="img-fluid" alt="Youtube">
                            @endif
                            @if(!empty($youtube))
                                <div class="play-icon">
                                    <img src="{{asset('module/vendor/img/ico-play.svg')}}" alt="Play background" class="img-fluid play-image">
                                </div>
                            @endif
                        </span>
                    </div>
                    @if(!empty($youtube))
                        <div class="modal fade" id="video-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content p-0">
                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@section('footer')
    <script type="text/javascript" src="{{ asset("/module/vendor/js/vendor-register.js?_ver=".config('app.version')) }}"></script>
@endsection
