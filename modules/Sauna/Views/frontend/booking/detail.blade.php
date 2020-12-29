@php $lang_local = app()->getLocale() @endphp
<div class="booking-review">
    <h4 class="booking-review-title">{{__("Your Booking")}}</h4>
    <div class="booking-review-content">
        <div class="review-section">
            <div class="service-info">
                <div>
                    @php
                        $service_translation = $service->translateOrOrigin($lang_local);
                    @endphp
                    <h3 class="service-name"><a href="{{$service->getDetailUrl()}}">{{$service_translation->title}}</a></h3>
                    @if($service_translation->address)
                        <p class="address"><i class="fa fa-map-marker"></i>
                            {{$service_translation->address}}
                        </p>
                    @endif
                </div>
                <div>
                    @if($image_url = $service->getImageUrl())
                        <img src="{{$image_url}}" alt="{{$service->title}}">
                    @endif
                </div>
                @php $vendor = $service->author; @endphp
                @if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access'))
                    <div class="mt-1">
                        <i class="icofont-info-circle"></i>
                        {{ __("Vendor") }}: <a href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank" >{{$vendor->getDisplayName()}}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="review-section">
            <ul class="review-list">
                @if($booking->start_date)
                    <li>
                        <div class="label">{{__('Start date:')}}</div>
                        <div class="val">
                            {{display_date($booking->start_date)}}
                        </div>
                    </li>
                    <li>
                        <div class="label">{{__('Duration:')}}</div>
                        <div class="val">
                            @php $duration = $booking->getMeta("duration") @endphp
                            {{duration_format($duration,true)}}
                        </div>
                    </li>
                @endif
                @php $ticket_types = $booking->getJsonMeta('ticket_types')@endphp
                @if(!empty($ticket_types))
                    @foreach($ticket_types as $type)
                        <li>
                            <div class="label">{{$type['name_'.$lang_local] ?? $type['name']}}:</div>
                            <div class="val">
                                {{$type['number']}}
                            </div>
                        </li>
                    @endforeach
                 @endif
            </ul>
        </div>
        {{--@include('Booking::frontend/booking/checkout-coupon')--}}
        @do_action('booking.checkout.before_total_review')
        <div class="review-section total-review">
            <ul class="review-list">
                @php $ticket_types = $booking->getJsonMeta('ticket_types') @endphp
                @if(!empty($ticket_types))
                    @foreach($ticket_types as $type)
                        <li>
                            <div class="label">{{ $type['name_'.$lang_local] ?? $type['name']}}: {{$type['number']}} * {{format_money($type['price'])}}</div>
                            <div class="val">
                                {{format_money($type['price'] * $type['number'])}}
                            </div>
                        </li>
                    @endforeach
                @endif
                @php $extra_price = $booking->getJsonMeta('extra_price') @endphp
                @if(!empty($extra_price))
                    <li>
                        <div class="label-title"><strong>{{__("Extra Prices:")}}</strong></div>
                    </li>
                    <li class="no-flex">
                        <ul>
                            @foreach($extra_price as $type)
                                <li>
                                    <div class="label">{{$type['name_'.$lang_local] ?? $type['name']}}:</div>
                                    <div class="val">
                                        {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @if(!empty($booking->buyer_fees))
                    @php
                        $buyer_fees = json_decode($booking->buyer_fees , true);
                        foreach ($buyer_fees as $buyer_fee){
                            $fee_price = $buyer_fee['price'];
                            if(!empty($buyer_fee['unit']) and $buyer_fee['unit'] == "percent"){
                                $fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
                            }
                    @endphp
                    <li>
                        <div class="label">
                            {{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
                            <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>
                            @if(!empty($buyer_fee['per_ticket']) and $buyer_fee['per_ticket'] == "on")
                                : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                            @endif
                        </div>
                        <div class="val">
                            @if(!empty($buyer_fee['per_ticket']) and $buyer_fee['per_ticket'] == "on")
                                {{ format_money( $fee_price * $booking->total_guests ) }}
                            @else
                                {{ format_money( $fee_price ) }}
                            @endif
                        </div>
                    </li>
                    @php } @endphp
                @endif
                <li class="final-total d-block">
                    <div class="d-flex justify-content-between">
                        <div class="label">{{__("Total:")}}</div>
                        <div class="val">{{format_money($booking->total)}}</div>
                    </div>
                    @if($booking->status !='draft')
                        <div class="d-flex justify-content-between">
                            <div class="label">{{__("Paid:")}}</div>
                            <div class="val">{{format_money($booking->paid)}}</div>
                        </div>
                        @if($booking->paid < $booking->total )
                            <div class="d-flex justify-content-between">
                                <div class="label">{{__("Remain:")}}</div>
                                <div class="val">{{format_money($booking->total - $booking->paid)}}</div>
                            </div>
                        @endif
                    @endif
                </li>
                @include ('Booking::frontend/booking/checkout-deposit-amount')
            </ul>
        </div>
    </div>
</div>
