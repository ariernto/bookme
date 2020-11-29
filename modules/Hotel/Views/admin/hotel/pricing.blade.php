@if(is_default_lang())
    <div class="panel">
        <div class="panel-title"><strong>{{__("Check in/out time")}}</strong></div>
        <div class="panel-body">
            <div class="form-group d-none">
                <label>{{__('Allowed full day booking')}}</label>
                <br>
                <label>
                    <input type="checkbox" name="allow_full_day" @if($row->allow_full_day) checked @endif value="1"> {{__("Enable full day booking")}}
                </label>
                <div class="small">
                    {{__("You can book room with full day")}} <br>
                    {{__("Eg: booking from 22-23, then all days 22 and 23 are full, other people cannot book")}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Time for check in")}}</label>
                        <input type="text" value="{{$row->check_in_time}}" placeholder="{{__("Eg: 12:00AM")}}" name="check_in_time" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Time for check out")}}</label>
                        <input type="text" value="{{$row->check_out_time}}" placeholder="{{__("Eg: 11:00AM")}}" name="check_out_time" class="form-control">
                    </div>
                </div>
            </div>
            @if(is_default_lang())
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Min day before booking")}}</label>
                            <input type="number" name="min_day_before_booking" class="form-control" value="{{$row->min_day_before_booking}}" placeholder="{{__("Ex: 3")}}">
                            <i>{{ __("Leave blank if you dont need to use the min day option") }}</i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Min day stays")}}</label>
                            <input type="number" name="min_day_stays" class="form-control" value="{{$row->min_day_stays}}" placeholder="{{__("Ex: 2")}}">
                            <i>{{ __("Leave blank if you dont need to use the min day stays option") }}</i>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="panel">
        <div class="panel-title"><strong>{{__("Pricing")}}</strong></div>
        <div class="panel-body">
            @if(is_default_lang())
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Price")}}</label>
                            <input type="number" step="any" min="0" name="price" class="form-control" value="{{$row->price}}" placeholder="{{__("Hotel Price")}}">
                        </div>
                    </div>
                    <div class="col-lg-6 d-none">
                        <div class="form-group">
                            <label class="control-label">{{__("Sale Price")}}</label>
                            <input type="number" step="any" name="sale_price" class="form-control" value="{{$row->sale_price}}" placeholder="{{__("Hotel Sale Price")}}">
                            <span><i>{{__("If the regular price is less than the discount , it will show the regular price")}}</i></span>
                        </div>
                    </div>
                </div>
            @endif
                <div class="form-group @if(!is_default_lang()) d-none @endif">
                    <label><input type="checkbox" name="enable_extra_price" @if(!empty($row->enable_extra_price)) checked @endif value="1"> {{__('Enable extra price')}}
                    </label>
                </div>
                <div class="form-group-item @if(!is_default_lang()) d-none @endif" data-condition="enable_extra_price:is(1)">
                    <label class="control-label">{{__('Extra Price')}}</label>
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-5">{{__("Name")}}</div>
                            <div class="col-md-3">{{__('Price')}}</div>
                            <div class="col-md-3">{{__('Type')}}</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="g-items">
                    @if(!empty($row->extra_price))
                        @foreach($row->extra_price as $key=>$extra_price)
                            <div class="item" data-number="{{$key}}">
                                <div class="row">
                                    <div class="col-md-5">
                                        @if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale'))
                                            @foreach($languages as $language)
                                                <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                <div class="g-lang">
                                                    <div class="title-lang">{{$language->name}}</div>
                                                    <input type="text" name="extra_price[{{$key}}][name{{$key_lang}}]" class="form-control" value="{{$extra_price['name'.$key_lang] ?? ''}}" placeholder="{{__('Extra price name')}}">
                                                </div>
                                            @endforeach
                                        @else
                                            <input type="text" name="extra_price[{{$key}}][name]" class="form-control" value="{{$extra_price['name'] ?? ''}}" placeholder="{{__('Extra price name')}}">
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" @if(!is_default_lang()) disabled @endif min="0" name="extra_price[{{$key}}][price]" class="form-control" value="{{$extra_price['price']}}">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="extra_price[{{$key}}][type]" class="form-control" @if(!is_default_lang()) disabled @endif>
                                            <option @if($extra_price['type'] ==  'one_time') selected @endif value="one_time">{{__("One-time")}}</option>
                                            <option @if($extra_price['type'] ==  'per_day') selected @endif value="per_day">{{__("Per day")}}</option>
                                        </select>
                                        <label>
                                            <input type="checkbox" min="0" name="extra_price[{{$key}}][per_person]" value="on" @if($extra_price['per_person'] ?? '') checked @endif >
                                            {{__("Price per person")}}
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        @if(is_default_lang())
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="text-right">
                    @if(is_default_lang())
                        <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                    @endif
                </div>
                <div class="g-more hide">
                    <div class="item" data-number="__number__">
                        <div class="row">
                            <div class="col-md-5">
                                @if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale'))
                                    @foreach($languages as $language)
                                        <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                        <div class="g-lang">
                                            <div class="title-lang">{{$language->name}}</div>
                                            <input type="text" __name__="extra_price[__number__][name{{$key}}]" class="form-control" value="" placeholder="{{__('Extra price name')}}">
                                        </div>
                                    @endforeach
                                @else
                                    <input type="text" __name__="extra_price[__number__][name]" class="form-control" value="" placeholder="{{__('Extra price name')}}">
                                @endif
                            </div>
                            <div class="col-md-3">
                                <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <select __name__="extra_price[__number__][type]" class="form-control">
                                    <option value="one_time">{{__("One-time")}}</option>
                                    <option value="per_day">{{__("Per day")}}</option>
                                </select>
                                <label>
                                    <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]" value="on">
                                    {{__("Price per person")}}
                                </label>
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
@endif
