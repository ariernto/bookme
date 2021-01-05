@if(is_default_lang())
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Currency")}}</h3>
        <p class="form-group-desc">{{__('Currency Format')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>
                    {{__("Main Currency")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        {!! \App\Helpers\AdminForm::select('currency_main',\App\Currency::getAll(),$settings['currency_main'] ?? 'usd','dungdt-select2-field') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >{{__("Format")}}</label>
                            <div class="form-controls">
                                {!! \App\Helpers\AdminForm::select('currency_format',[
                                    ['id'=>'right','name'=>__('Right (100$)')],
                                    ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                    ['id'=>'left','name'=>__('Left ($100)')],
                                    ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                ],$settings['currency_format'] ?? 'right') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >{{__("Thousand Separator")}}</label>
                            <div>
                                <input type="text" name="currency_thousand" class="form-control" value="{{$settings['currency_thousand'] ?? '.'}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >{{__("Decimal Separator")}}</label>
                            <div>
                                <input type="text" name="currency_decimal" class="form-control" value="{{$settings['currency_decimal'] ?? ','}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >{{__("No. of Decimals")}}</label>
                            <div>
                                <input type="number" name="currency_no_decimal" min=0 max = 6 class="form-control" value="{{$settings['currency_no_decimal'] ?? 2}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>
                   {{__("Extra Currency")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group-item">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-3">{{__("Currency")}}</div>
                                    <div class="col-md-8">{{__('Format')}}</div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                $extra_currency = setting_item_array('extra_currency',[]);
                                ?>
                                @foreach($extra_currency as $key=>$item)
                                    <div class="item" data-number="{{$key}}">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <label class="" >{{__("Sub Currency")}}</label>
                                                {!! \App\Helpers\AdminForm::select('extra_currency['.$key.'][currency_main]',\App\Currency::getAll(),$item['currency_main'] ?? '','dungdt-select2-field') !!}
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >{{__("Format")}}</label>
                                                            <div class="form-controls">
                                                                {!! \App\Helpers\AdminForm::select('extra_currency['.$key.'][currency_format]',[
                                                                    ['id'=>'right','name'=>__('Right (100$)')],
                                                                    ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                                                    ['id'=>'left','name'=>__('Left ($100)')],
                                                                    ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                                                ],$item['currency_format'] ?? '') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >{{__("Thousand Separator")}}</label>
                                                            <div>
                                                                <input type="text" name="extra_currency[{{$key}}][currency_thousand]" class="form-control" value="{{$item['currency_thousand'] ?? '.'}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >{{__("Decimal Separator")}}</label>
                                                            <div>
                                                                <input type="text" name="extra_currency[{{$key}}][currency_decimal]" class="form-control" value="{{$item['currency_decimal'] ?? ','}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >{{__("No. of Decimals")}}</label>
                                                            <div>
                                                                <input type="number" name="extra_currency[{{$key}}][currency_no_decimal]" min=0 max = 6 class="form-control" value="{{$item['currency_no_decimal'] ?? 2}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label >{{__("Exchange rate")}}</label>
                                                    <div>
                                                        <input step=any type="text" name="extra_currency[{{$key}}][rate]" min=0 class="form-control" value="{{$item['rate'] ?? 0}}">
                                                        <p><i>{{__('Example: Main currency is VND, and the extra currency is USD, so the exchange rate must be 23400 (1 USD ~ 23400 VND)')}}</i></p>
                                                    </div>
                                                </div>
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
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="" >{{__("Sub Currency")}}</label>
                                                <div class="form-controls">
                                            {!! \App\Helpers\AdminForm::select('extra_currency[__number__][currency_main]',\App\Currency::getAll(),'','dungdt-select2-field-lazy',true) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__("Format")}}</label>
                                                        <div class="form-controls">
                                                            {!! \App\Helpers\AdminForm::select('extra_currency[__number__][currency_format]',[
                                                                ['id'=>'right','name'=>__('Right (100$)')],
                                                                ['id'=>'right_space','name'=>__('Right with space (100 $)')],
                                                                ['id'=>'left','name'=>__('Left ($100)')],
                                                                ['id'=>'left_space','name'=>__('Left with space ($ 100)')],
                                                            ],'right','',true) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__("Thousand Separator")}}</label>
                                                        <div>
                                                            <input type="text" __name__="extra_currency[__number__][currency_thousand]" class="form-control" value=".">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__("Decimal Separator")}}</label>
                                                        <div>
                                                            <input type="text" __name__="extra_currency[__number__][currency_decimal]" class="form-control" value=",">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__("No. of Decimals")}}</label>
                                                        <div>
                                                            <input type="number" __name__="extra_currency[__number__][currency_no_decimal]" min=0 max = 6 class="form-control" value="2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label >{{__("Exchange rate")}}</label>
                                                <div>
                                                    <input step=any type="text" __name__="extra_currency[__number__][rate]" min=0 class="form-control" value="">
                                                    <p><i>{{__('Example: Main currency is VND, and the extra currency is USD, so the exchange rate must be 23400 (1 USD ~ 23400 VND)')}}</i></p>
                                                </div>
                                            </div>
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
@endif

@if(is_default_lang())
<hr>
<div class="row">
    <div class="col-md-4">
        <h3 class="form-group-title">{{__("Payment Gateways")}}</h3>
        <p class="form-group-desc">{{__('You can enable and disable your payment gateways here')}}</p>
    </div>
    <div class="col-md-8">
        @php
            $all = get_payment_gateways();
        @endphp
        @foreach($all as $k=>$gateway)
            @php
                if(!class_exists($gateway)) continue;
                $obj = new $gateway($k);
                $options = $obj->getOptionsConfigsFormatted();
            @endphp
            <div class="panel">
                <div class="panel-title"><strong>{{$obj->name}}</strong>
                    <span data-toggle="collapse" href="#gateway_{{$k}}" class="panel-toggle btn btn-sm" ><i class="fa fa-chevron-down"></i></span>
                </div>
                <div class="panel-body collapse" id="gateway_{{$k}}">
                    <div class="" >
                        @php App\Helpers\AdminForm::generate($options); @endphp
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif