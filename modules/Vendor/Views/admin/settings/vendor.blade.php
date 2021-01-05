<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('General Settings')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Terms & Conditions")}}</label>
                    <div class="form-controls">
                        <?php
                        $template = !empty($settings['vendor_term_conditions']) ? \Modules\Page\Models\Page::find($settings['vendor_term_conditions'] ) : false;
                        \App\Helpers\AdminForm::select2('vendor_term_conditions',[
                            'configs'=>[
                                'ajax'=>[
                                    'url'=>url('/admin/module/page/getForSelect2'),
                                    'dataType'=>'json'
                                ]
                            ]
                        ],
                            !empty($template->id) ? [$template->id,$template->title] :false
                        )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Config Vendor')}}</h3>
        <p class="form-group-desc">{{__('Change your config vendor system')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" @if($settings['vendor_enable'] ?? '' == 1) checked @endif name="vendor_enable" value="1"> {{__("Vendor Enable?")}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-condition="vendor_enable:is(1)">
                        <label>{{__('Vendor Commission Type')}}</label>
                        <div class="form-controls">
                            <select name="vendor_commission_type" class="form-control">
                                <option value="percent" {{($settings['vendor_commission_type'] ?? '') == 'percent' ? 'selected' : ''  }}>{{__('Percent')}}</option>
                                <option value="amount" {{($settings['vendor_commission_type'] ?? '') == 'amount' ? 'selected' : ''  }}>{{__('Amount')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" data-condition="vendor_enable:is(1)">
                        <label>{{__('Vendor commission value')}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="vendor_commission_amount" value="{{!empty($settings['vendor_commission_amount'])?$settings['vendor_commission_amount']:"0" }}">
                        </div>
                        <p>
                            <i>{{__('Example value : 10 or 10.5')}}</i><br>
                            <i>{{__('Example: 10% commssion. Vendor get 90%, Admin get 10%')}}</i>
                        </p>
                    </div>
                @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Vendor Register')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" @if($settings['vendor_auto_approved'] ?? '' == 1) checked @endif name="vendor_auto_approved" value="1"> {{__("Vendor Auto Approved?")}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('Vendor Role')}}</label>
                        <div class="form-controls">
                            <select name="vendor_role" class="form-control">

                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{$role->id}}" {{($settings['vendor_role'] ?? '') == $role->id ? 'selected': ''  }}>{{ucfirst($role->name)}}</option>
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
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Vendor Profile')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" @if($settings['vendor_show_email'] ?? '' == 1) checked @endif name="vendor_show_email" value="1"> {{__("Show vendor email in profile?")}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="form-group">
                                <label> <input type="checkbox" @if($settings['vendor_show_phone'] ?? '' == 1) checked @endif name="vendor_show_phone" value="1"> {{__("Show vendor phone in profile?")}}</label>
                            </div>
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
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Payout Options')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Payout Options")}}</strong></div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="form-controls">
                        <label ><strong>{{__("Disable Payout Module?")}}</strong></label>
                        <div class="form-group">
                            <label> <input type="checkbox" @if(setting_item('disable_payout') == 1) checked @endif name="disable_payout" value="1"> {{__("Yes, please disable it")}}</label>
                        </div>
                    </div>
                </div>

                @php $vendor_payout_booking_status = setting_item('vendor_payout_booking_status','',true) @endphp
                <div class="form-group">
                    <label><strong>{{__("Booking Status Conditions")}}</strong></label>
                    <div class="form-controls">
                        <div><label><input name="vendor_payout_booking_status[]" @if(in_array('processing',$vendor_payout_booking_status)) checked @endif type="checkbox" value="processing"> {{__("Processing")}}</label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" @if(in_array('confirmed',$vendor_payout_booking_status)) checked @endif type="checkbox" value="confirmed"> {{__("Confirmed")}}</label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" @if(in_array('completed',$vendor_payout_booking_status)) checked @endif type="checkbox" value="completed"> {{__("Completed")}}</label></div>
                        <div><label><input  name="vendor_payout_booking_status[]" @if(in_array('paid',$vendor_payout_booking_status)) checked @endif type="checkbox" value="paid"> {{__("Paid")}}</label></div>
                    </div>
                    <p><i>{{__("Select booking status will be use for calculate payout of vendor")}}</i></p>
                </div>
                <div class="form-group">
                    <label><strong>{{__("Payout Methods")}}</strong></label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-1">{{__('ID')}}</div>
                                        <div class="col-md-8">{{__("Name")}}</div>
                                        <div class="col-md-2">{{__('Order')}}</div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $items = json_decode(setting_item('vendor_payout_methods'));
                                    if(empty($items) or !is_array($items))
                                        $items = [];
                                    ?>
                                    @foreach($items as $key=>$item)
                                        <div class="item" data-number="{{$key}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input placeholder="{{__('Eg: bank_transfer')}}" type="text" name="vendor_payout_methods[{{$key}}][id]" class="form-control" value="{{$item->id}}" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label >{{__("Name")}}</label>
                                                    <input type="text" name="vendor_payout_methods[{{$key}}][name]" class="form-control" value="{{$item->name}}">
                                                    <label >{{__("Description")}}</label>
                                                    <textarea  name="vendor_payout_methods[{{$key}}][desc]" class="form-control" cols="30" rows="4">{{$item->desc}}</textarea>
                                                    <label >{{__("Minimum to pay")}}</label>
                                                    <input type="text" name="vendor_payout_methods[{{$key}}][min]" class="form-control" value="{{$item->min ?? ''}}">
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="number" name="vendor_payout_methods[{{$key}}][order]" class="form-control" value="{{$item->order}}" >
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input placeholder="{{__('Eg: bank_transfer')}}" type="text" __name__="vendor_payout_methods[__number__][id]" class="form-control" value="" >
                                            </div>
                                            <div class="col-md-6">
                                                <label >{{__("Name")}}</label>
                                                <input type="text" __name__="vendor_payout_methods[__number__][name]" class="form-control" value="">
                                                <label >{{__("Description")}}</label>
                                                <textarea  __name__="vendor_payout_methods[__number__][desc]" class="form-control" cols="30" rows="4"></textarea>
                                                <label >{{__("Minimum to pay")}}</label>
                                                <input type="text" __name__="vendor_payout_methods[__number__][min]" class="form-control" value="">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" __name__="vendor_payout_methods[__number__][order]" class="form-control" value="" >
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email Vendor Registered')}}</h3>
        <div class="form-group-desc">{{ __('Content email send to Vendor or Administrator when user registered.')}}
            @foreach(\Modules\User\Listeners\SendVendorRegisterdEmail::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['enable_mail_vendor_registered'] ?? '' == 1) checked @endif name="enable_mail_vendor_registered" value="1"> {{__("Enable send email to customer when customer registered ?")}}</label>
                    </div>
                @else
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['enable_mail_vendor_registered'] ?? '' == 1) checked @endif disabled name="enable_mail_vendor_registered" value="1"> {{__("Enable send email to customer when customer registered ?")}}</label>
                    </div>
                    @if($settings['enable_mail_vendor_registered'] != 1)
                        <p>{{__('You must enable on main lang.')}}</p>
                    @endif
                @endif

                <div class="form-group" data-condition="enable_mail_vendor_registered:is(1)">
                    <label>{{__("Email to vendor content")}}</label>
                    <div class="form-controls">
                        <textarea name="vendor_content_email_registered" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('vendor_content_email_registered',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>


                @if(is_default_lang())
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['admin_enable_mail_vendor_registered'] ?? '' == 1) checked @endif name="admin_enable_mail_vendor_registered" value="1"> {{__("Enable send email to Administrator when customer registered ?")}}</label>
                    </div>
                @else
                    <div class="form-group">
                        <label> <input type="checkbox" @if($settings['admin_enable_mail_vendor_registered'] ?? '' == 1) checked @endif disabled name="admin_enable_mail_vendor_registered" value="1"> {{__("Enable send email to Administrator when customer registered ?")}}</label>
                    </div>
                    @if($settings['admin_enable_mail_vendor_registered'] != 1)
                        <p>{{__('You must enable on main lang.')}}</p>
                    @endif
                @endif
                <div class="form-group" data-condition="admin_enable_mail_vendor_registered:is(1)">
                    <label>{{__("Email to Administrator content")}}</label>
                    <div class="form-controls">
                        <textarea name="admin_content_email_vendor_registered" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('admin_content_email_vendor_registered',request()->query('lang'))?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>