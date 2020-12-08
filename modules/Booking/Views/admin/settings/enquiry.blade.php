@if(is_default_lang())
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Settings Enquiry for Service')}}</h3>
            <p class="form-group-desc">{{__('Change your enquiry options')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>{{__("Enable enquiry for Hotel")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_for_hotel" value="1" @if(!empty($settings['booking_enquiry_for_hotel'])) checked @endif /> {{__("Enable enquiry form")}} </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable enquiry for Tour")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_for_tour" value="1" @if(!empty($settings['booking_enquiry_for_tour'])) checked @endif /> {{__("Enable enquiry form")}} </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable enquiry for Space")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_for_space" value="1" @if(!empty($settings['booking_enquiry_for_space'])) checked @endif /> {{__("Enable enquiry form")}} </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable enquiry for Car")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_for_car" value="1" @if(!empty($settings['booking_enquiry_for_car'])) checked @endif /> {{__("Enable enquiry form")}} </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable enquiry for Event")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_for_event" value="1" @if(!empty($settings['booking_enquiry_for_event'])) checked @endif /> {{__("Enable enquiry form")}} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Settings Enquiry')}}</h3>
            <p class="form-group-desc">{{__('Change your enquiry options')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>{{__("Enquiry Type")}}</label>
                        <div class="form-controls">
                            <select name="booking_enquiry_type" class="form-control">
                                <option {{ ($settings['booking_enquiry_type'] ?? '') == 'booking_and_enquiry' ? 'selected' : '' }} value="booking_and_enquiry">{{__("Booking & Enquiry")}}</option>
                                <option {{ ($settings['booking_enquiry_type'] ?? '') == 'only_enquiry' ? 'selected' : '' }} value="only_enquiry">{{__("Only Enquiry")}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable re-catpcha for enquiry?")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="booking_enquiry_enable_recaptcha" value="1" @if(!empty($settings['booking_enquiry_enable_recaptcha'])) checked @endif /> {{__("Enable re-captcha at enquiry form")}} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Settings Email Enquiry')}}</h3>
            <p class="form-group-desc">{{__('Change your email enquiry options')}}</p>
            @foreach(\Modules\Booking\Listeners\EnquirySendListen::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">

                    @if(is_default_lang())
                        <div class="form-group">
                            <label> <input type="checkbox" @if($settings['booking_enquiry_enable_mail_to_vendor'] ?? '' == 1) checked @endif name="booking_enquiry_enable_mail_to_vendor" value="1"> {{__("Enable send email to Vendor")}}</label>
                        </div>
                    @else
                        <div class="form-group">
                            <label> <input type="checkbox" @if($settings['booking_enquiry_enable_mail_to_vendor'] ?? '' == 1) checked @endif disabled name="booking_enquiry_enable_mail_to_vendor" value="1"> {{__("Enable send email to Vendor")}}</label>
                        </div>
                        @if($settings['booking_enquiry_enable_mail_to_vendor'] != 1)
                            <p>{{__('You must enable on main lang.')}}</p>
                        @endif
                    @endif
                    <div class="form-group" data-condition="booking_enquiry_enable_mail_to_vendor:is(1)">
                        <label>{{__("Email to Vendor content")}}</label>
                        <div class="form-controls">
                            <textarea name="booking_enquiry_mail_to_vendor_content" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('booking_enquiry_mail_to_vendor_content',request()->query('lang'))?? '' }}</textarea>
                        </div>
                    </div>

                    @if(is_default_lang())
                        <div class="form-group">
                            <label> <input type="checkbox" @if($settings['booking_enquiry_enable_mail_to_admin'] ?? '' == 1) checked @endif name="booking_enquiry_enable_mail_to_admin" value="1"> {{__("Enable send email to Administrator")}}</label>
                        </div>
                    @else
                        <div class="form-group">
                            <label> <input type="checkbox" @if($settings['booking_enquiry_enable_mail_to_admin'] ?? '' == 1) checked @endif disabled name="booking_enquiry_enable_mail_to_admin" value="1"> {{__("Enable send email to Administrator")}}</label>
                        </div>
                        @if($settings['booking_enquiry_enable_mail_to_admin'] != 1)
                            <p>{{__('You must enable on main lang.')}}</p>
                        @endif
                    @endif
                    <div class="form-group" data-condition="booking_enquiry_enable_mail_to_admin:is(1)">
                        <label>{{__("Email to Administrator content")}}</label>
                        <div class="form-controls">
                            <textarea name="booking_enquiry_mail_to_admin_content" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('booking_enquiry_mail_to_admin_content',request()->query('lang'))?? '' }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif
