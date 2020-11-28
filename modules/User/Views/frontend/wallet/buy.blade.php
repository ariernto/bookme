@extends('layouts.user')
@section('head')
    <link rel="stylesheet" href="{{asset('module/booking/css/checkout.css')}}">
@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Buy credits")}}
    </h2>
    @include('admin.message')
    <form action="{{route('user.wallet.buyProcess')}}" method="post">
    <div class="bravo-user-dashboard">
        <div class="panel">
            <div class="panel-title"><strong >{{__("Buy")}}</strong></div>
            <div class="panel-body">
                @csrf

                @if(setting_item('wallet_deposit_type') == 'list')
                    @if(!empty($wallet_deposit_lists))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Price')}}</th>
                                    <th scope="col">{{__("Credit")}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wallet_deposit_lists as $k=>$item)
                                    <tr>
                                        <td>{{$k + 1}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{format_money($item['amount'])}}</td>
                                        <td>{{$item['credit']}}</td>
                                        <td><label class="btn btn-info" >
                                                <input type="radio" name="deposit_option" value="{{$k}}"> {{__("Select")}} </label></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">{{__("Sorry, no options found")}}</div>
                    @endif
                @else
                    <div class="form-section mt-3">
                        <h4 class="form-section-title">{{__("How much would you like to deposit?")}}</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control update_exchange_value" name="deposit_amount" placeholder="{{__('Deposit amount')}}" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text deposit_exchange_value" data-rate="{{(float)setting_item('wallet_deposit_rate',1)}}" ></span>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-section mt-3">
                    <h4 class="form-section-title">{{__('Select Payment Method')}}</h4>
                    <div class="gateways-table accordion mt-3" id="accordionExample">
                        @foreach($gateways as $k=>$gateway)
                            <div class="card">
                                <div class="card-header">
                                    <strong class="mb-0">
                                        <label class="" data-toggle="collapse" data-target="#gateway_{{$k}}" >
                                            <input type="radio" name="payment_gateway" value="{{$k}}">
                                            @if($logo = $gateway->getDisplayLogo())
                                                <img src="{{$logo}}" alt="{{$gateway->getDisplayName()}}">
                                            @endif
                                            {{$gateway->getDisplayName()}}
                                        </label>
                                    </strong>
                                </div>
                                <div id="gateway_{{$k}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="gateway_name">
                                            {!! $gateway->getDisplayName() !!}
                                        </div>
                                        {!! $gateway->getDisplayHtml() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @php
                    $term_conditions = setting_item('booking_term_conditions');
                @endphp

                <div class="form-group mt-3">
                    <label class="term-conditions-checkbox">
                        <input type="checkbox" name="term_conditions"> {{__('I have read and accept the')}}  <a target="_blank" href="{{get_page_url($term_conditions)}}">{{__('terms and conditions')}}</a>
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit">{{ __('Process now')}}</button>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('footer')

@endsection
