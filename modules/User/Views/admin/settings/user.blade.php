@if(is_default_lang())
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__("Inbox System")}}</h3>
            <p class="form-group-desc">{{__('Config inbox option')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" >{{__("Allow customer can send message to the vendor on detail page")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="inbox_enable" value="1" @if(!empty($settings['inbox_enable'])) checked @endif /> {{__("Yes please")}} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(is_default_lang())
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__("Google reCapcha Options")}}</h3>
            <p class="form-group-desc">{{__('Config google recapcha for system')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="">{{__("Enable reCapcha Login Form")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="user_enable_login_recaptcha" value="1" @if(!empty($settings['user_enable_login_recaptcha'])) checked @endif /> {{__("On")}} </label>
                            <br>
                            <small class="form-text text-muted">{{__("Turn on the mode for login form")}}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">{{__("Enable reCapcha Register Form")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="user_enable_register_recaptcha" value="1" @if(!empty($settings['user_enable_register_recaptcha'])) checked @endif /> {{__("On")}} </label>
                            <br>
                            <small class="form-text text-muted">{{__("Turn on the mode for register form")}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endif
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email User Registered')}}</h3>
        <div class="form-group-desc">{{ __('Content email send to Customer or Administrator when user registered.')}}
            @foreach(\Modules\User\Listeners\SendMailUserRegisteredListen::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['enable_mail_user_registered'] ?? '' == 1) checked @endif name="enable_mail_user_registered" value="1"> {{__("Enable send email to customer when customer registered ?")}}</label>
                    </div>
                @else
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['enable_mail_user_registered'] ?? '' == 1) checked @endif disabled name="enable_mail_user_registered" value="1"> {{__("Enable send email to customer when customer registered ?")}}</label>
                    </div>
                    @if($settings['enable_mail_user_registered'] != 1)
                        <p>{{__('You must enable on main lang.')}}</p>
                    @endif
                @endif

                <div class="form-group" data-condition="enable_mail_user_registered:is(1)">
                    <label>{{__("Email to customer content")}}</label>
                    <div class="form-controls">
                        <textarea name="user_content_email_registered" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('user_content_email_registered',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>


                @if(is_default_lang())
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['admin_enable_mail_user_registered'] ?? '' == 1) checked @endif name="admin_enable_mail_user_registered" value="1"> {{__("Enable send email to Administrator when customer registered ?")}}</label>
                    </div>
                @else
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['admin_enable_mail_user_registered'] ?? '' == 1) checked @endif disabled name="admin_enable_mail_user_registered" value="1"> {{__("Enable send email to Administrator when customer registered ?")}}</label>
                    </div>
                        @if($settings['admin_enable_mail_user_registered'] != 1)
                            <p>{{__('You must enable on main lang.')}}</p>
                        @endif
                @endif
                <div class="form-group" data-condition="admin_enable_mail_user_registered:is(1)">
                    <label>{{__("Email to Administrator content")}}</label>
                    <div class="form-controls">
                        <textarea name="admin_content_email_user_registered" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('admin_content_email_user_registered',request()->query('lang'))?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email User Verify Registered')}}</h3>
        <div class="form-group-desc">{{ __('Content email verify send to Customer when user registered.')}}
            @foreach(\Modules\User\Emails\EmailUserVerifyRegister::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                
                <div class="form-group">
                    <label>{{__("Subject")}}</label>
                    <div class="form-controls">
                        <input type="text" name="subject_email_verify_register_user" class="form-control"  value="{{setting_item_with_lang('subject_email_verify_register_user',request()->query('lang')) ?? '' }}">
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="content_email_verify_register_user" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('content_email_verify_register_user',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>
               
            
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email User Forgot Password')}}</h3>
        <div class="form-group-desc">
            @foreach(\Modules\User\Emails\ResetPasswordToken::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="user_content_email_forget_password" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('user_content_email_forget_password',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
