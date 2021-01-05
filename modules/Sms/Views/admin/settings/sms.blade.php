<div class="row mb-3">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Config Sms')}}</h3>
        <p class="form-group-desc">{{__('SMS driver')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__('Sms Driver')}}</label>
                        <div class="form-controls">
                            <select name="sms_driver" class="form-control">
                                @foreach(\Modules\Sms\SettingClass::SMS_DRIVER as $item=>$value)
                                    <option value="{{$value}}" {{(setting_item('sms_driver') ?? '') == $value ? 'selected' : ''  }}>{{__(strtoupper($value))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@if(is_default_lang())
    <div class="row " data-condition="sms_driver:is(nexmo)">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Config Nexmo Driver')}}</h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="sms_driver:is(nexmo)">
                        <div class="form-group">
                            <label class="">{{__("Nexmo Api Key")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_key" value="{{setting_item('sms_nexmo_api_key',config('sms.nexmo.key')) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Nexmo Api Secret")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_secret" value="{{setting_item('sms_nexmo_api_secret',config('sms.nexmo.secret'))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("From")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_nexmo_api_from" value="{{setting_item('sms_nexmo_api_from',config('sms.nexmo.from'))}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-condition="sms_driver:is(twilio)">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Config Twilio Driver')}}</h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="sms_driver:is(twilio)">
                        <div class="form-group">
                            <label class="">{{__("Twilio Account Sid")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_twilio_account_sid" value="{{setting_item('sms_twilio_account_sid',config('sms.twilio.sid'))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Twilio Account Token")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="sms_twilio_account_token" value="{{setting_item('sms_twilio_account_token',config('sms.twilio.token'))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("From")}}</label>
                            <div class="form-controls">
                                <input type="number" class="form-control" name="sms_twilio_api_from" value="{{setting_item('sms_twilio_api_from',config('sms.twilio.from'))}}">
                            </div>
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
        <h3 class="form-group-title">{{__('SMS Event Booking')}}</h3>
        <div class="form-group-desc">
            {{__('Phone number must be E.164 format')}}
            <p>{{__('Format')}}:<code> {{__('[+][country code][subscriber number including area code]')}} </code></p>
            <p>{{__('Example')}}:<code> +12019480710</code></p>
            <div>{{__('Message')}}:</div>
            @foreach(\Modules\Sms\Listeners\SendSmsBookingListen::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Config Phone Administrator")}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                <div class="form-group">
                    <label>{{__('Admin Phone')}} </label>
                    <div class="form-controls">
                        <input type="number" class="form-control" name="admin_phone_has_booking" value="{{setting_item_with_lang('admin_phone_has_booking',request()->query('lang')) ?? ''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="">{{__("Country")}}</label>
                    <select name="admin_country_has_booking" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if(setting_item_with_lang('admin_country_has_booking',request()->query('lang')) ==$id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                    @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Create Booking")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SmsAdminEventCreateBooking">{{__("Administrator")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsVendorEventCreateBooking">{{__("Vendor")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsUserEventCreateBooking">{{__("Customer")}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="SmsAdminEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_admin_has_booking')?? '' == 1) checked @endif name="enable_sms_admin_has_booking" value="1"> {{__("Enable send sms to Administrator when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_admin_has_booking') ?? '' == 1) checked @endif name="enable_sms_admin_has_booking" disabled value="1"> {{__("Enable send sms to Administrator when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_sms_admin_has_booking')!= 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div data-condition="enable_sms_admin_has_booking:is(1)">
                                <div class="form-group">
                                    <label>{{__("Message to Administrator")}}</label>
                                    <div class="form-controls">
                                        <textarea name="sms_message_admin_when_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_admin_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsVendorEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_vendor_has_booking') ?? '' == 1) checked @endif name="enable_sms_vendor_has_booking" value="1"> {{__("Enable send sms to Vendor when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_vendor_has_booking') ?? '' == 1) checked @endif name="enable_sms_vendor_has_booking" disabled value="1"> {{__("Enable send sms to Vendor when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_sms_vendor_has_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_sms_vendor_has_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="sms_message_vendor_when_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_vendor_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsUserEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_user_has_booking') ?? '' == 1) checked @endif name="enable_sms_user_has_booking" value="1"> {{__("Enable send sms to Customer when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_user_has_booking') ?? '' == 1) checked @endif name="enable_sms_user_has_booking" disabled value="1"> {{__("Enable send sms to Customer when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_sms_user_has_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_sms_user_has_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="sms_message_user_when_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_user_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Update booking")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SmsAdminEventUpdateBooking">{{__("Administrator")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsVendorEventUpdateBooking">{{__("Vendor")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#SmsUserEventUpdateBooking">{{__("Customer")}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="SmsAdminEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_admin_update_booking') ?? '' == 1) checked @endif name="enable_sms_admin_update_booking" value="1"> {{__("Enable send sms to Administrator when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_admin_update_booking') ?? '' == 1) checked @endif name="enable_sms_admin_update_booking" disabled value="1"> {{__("Enable send sms to Administrator when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_sms_admin_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div data-condition="enable_sms_admin_update_booking:is(1)">
                                <div class="form-group">
                                    <label>{{__("Message to Administrator")}}</label>
                                    <div class="form-controls">
                                        <textarea name="sms_message_admin_update_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_admin_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsVendorEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_vendor_update_booking') ?? '' == 1) checked @endif name="enable_sms_vendor_update_booking" value="1"> {{__("Enable send sms to Vendor when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(@setting_item('enable_sms_vendor_update_booking') ?? '' == 1) checked @endif name="enable_sms_vendor_update_booking" disabled value="1"> {{__("Enable send sms to Vendor when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_sms_vendor_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_sms_vendor_update_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="sms_message_vendor_update_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_vendor_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SmsUserEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(@setting_item('enable_sms_user_update_booking') ?? '' == 1) checked @endif name="enable_sms_user_update_booking" value="1"> {{__("Enable send sms to Customer when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_sms_user_has_booking') ?? '' == 1) checked @endif name="enable_sms_user_has_booking" disabled value="1"> {{__("Enable send sms to Customer when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_sms_user_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_sms_user_update_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="sms_message_user_update_booking" rows="8" class="form-control">{{setting_item_with_lang('sms_message_user_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Sms Testing')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label class="">{{__("Country")}}</label>
                        <select name="country" class="form-control" id="country-sms-testing">
                            <option value="">{{__('-- Select --')}}</option>
                            @foreach(get_country_lists() as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-controls">
                        <label class="">{{__("To (phone number)")}}</label>
                        <input type="number" class="form-control" id="to-sms-testing" name="to"></input>
                    </div>

                    <div class="form-controls">
                        <label class="">{{__("Message")}}</label>
                        <textarea class="form-control" id="message-sms-testing" name="message"></textarea>
                    </div>
                    <div class="form-controls">
                        <br>
                        <div id="sms-testing" style="cursor: pointer;" class="btn btn-primary">{{__('Send Sms Test')}}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div id="sms-testing-alert" class="" role="alert">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script.body')
    <script>
        $(document).ready(function () {
            var cant_test = 1;
            $(document).on('click', '#sms-testing', function (e) {
                event.preventDefault();
                var to = $('#to-sms-testing').val();
                var message = $('#message-sms-testing').val();
                var country = $('#country-sms-testing').val();
                $.ajax({
                    url: '{{url('admin/module/sms/testSms')}}',
                    type: 'get',
                    data: {to: to, country: country, message: message},
                    beforeSend: function () {
                        $('#sms-testing').append(' <i class="fa  fa-spinner fa-spin"></i>').addClass('disabled');
                    },
                    success: function (res) {
                        if (res.error !== false) {
                            $('#sms-testing-alert').removeClass().addClass('alert alert-warning').html(res.messages);
                        } else {
                            $('#sms-testing-alert').removeClass().addClass('alert alert-success').html('<strong>Sms Test Success!</strong>');
                        }
                        cant_test = 1;
                    },
                    complete: function () {
                        $('#sms-testing').removeClass('disabled').find('i').remove();
                        cant_test = 1;
                    },
                    error: function (request, status, error) {
                        err = JSON.parse(request.responseText);
                        html = '<p><strong>' + request.statusText + '</strong></p><p>' + err.message + '</p>';
                        $('#sms-testing-alert').removeClass().addClass('alert alert-warning').html(html);
                        cant_test = 1;
                    }
                })

                setTimeout(function () {
                    $('#sms-testing-alert').html('').removeClass();
                }, 20000);
            })

        })
    </script>
@endsection
