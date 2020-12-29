<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
@if(is_default_lang())
<div class="panel">
    <div class="panel-title"><strong>{{__("Pricing")}}</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Price")}}</label>
                        <input type="number" step="any" min="0" name="price" class="form-control" value="{{$row->price}}" placeholder="{{__("Space Price")}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Sale Price")}}</label>
                        <input type="number" step="any" name="sale_price" class="form-control" value="{{$row->sale_price}}" placeholder="{{__("Space Sale Price")}}">
                        <span><i>{{__("If the regular price is less than the discount , it will show the regular price")}}</i></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Max Guests")}}</label>
                        <input type="number" step="any" name="max_guests" class="form-control" value="{{$row->max_guests}}" >
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
                                        <option @if($extra_price['type'] ==  'per_hour') selected @endif value="per_hour">{{__("Per hour")}}</option>
                                        <option @if($extra_price['type'] ==  'per_day') selected @endif value="per_day">{{__("Per day")}}</option>
                                    </select>

                                    <label>
                                        <input @if(!is_default_lang()) disabled @endif type="checkbox" min="0" name="extra_price[{{$key}}][per_person]" value="on" @if($extra_price['per_person'] ?? '') checked @endif >
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
                                <option value="per_hour">{{__("Per hour")}}</option>
                                <option value="per_day">{{__("Per day")}}</option>
                            </select>

                            <label>
                                <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]" class="form-control" value="on">
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
        @if(is_default_lang())
            <hr class="d-none">
            <h3 class="panel-body-title d-none">{{__('Discount by number of people')}}</h3>
            <div class="form-group-item d-none">
                <div class="g-items-header">
                    <div class="row">
                        <div class="col-md-4">{{__("No of people")}}</div>
                        <div class="col-md-3">{{__('Discount')}}</div>
                        <div class="col-md-3">{{__('Type')}}</div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="g-items">
                    @if(!empty($row->discount_by_people) and is_array($row->discount_by_people))
                        @foreach($row->discount_by_people as $key=>$item)
                            <div class="item" data-number="{{$key}}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" name="discount_by_people[{{$key}}][from]" class="form-control" value="{{$item['from']}}" placeholder="{{__('From')}}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" name="discount_by_people[{{$key}}][to]" class="form-control" value="{{$item['from']}}" placeholder="{{__('To')}}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" min="0" name="discount_by_people[{{$key}}][amount]" class="form-control" value="{{$item['amount']}}">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="discount_by_people[{{$key}}][type]" class="form-control">
                                            <option @if($item['type'] ==  'fixed') selected @endif value="fixed">{{__("Fixed")}}</option>
                                            <option @if($item['type'] ==  'percent') selected @endif value="percent">{{__("Percent (%)")}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                </div>
                <div class="g-more hide">
                    <div class="item" data-number="__number__">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="number" min="0" __name__="discount_by_people[__number__][from]" class="form-control" value="" placeholder="{{__('From')}}">
                            </div>
                            <div class="col-md-2">
                                <input type="number" min="0" __name__="discount_by_people[__number__][to]" class="form-control" value="" placeholder="{{__('To')}}">
                            </div>
                            <div class="col-md-3">
                                <input type="number" min="0" __name__="discount_by_people[__number__][amount]" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <select __name__="discount_by_people[__number__][type]" class="form-control">
                                    <option value="fixed">{{__("Fixed")}}</option>
                                    <option value="percent">{{__("Percent")}}</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endif
