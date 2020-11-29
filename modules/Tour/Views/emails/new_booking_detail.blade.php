<?php
$translation = $service->translateOrOrigin(app()->getLocale());
$lang_local = app()->getLocale();
?>
<div class="b-panel-title">{{__('Tour information')}}</div>
<div class="b-table-wrap">
    <table class="b-table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="label">{{__('Booking Number')}}</td>
            <td class="val">#{{$booking->id}}</td>
        </tr>
        <tr>
            <td class="label">{{__('Booking Status')}}</td>
            <td class="val">{{$booking->statusName}}</td>
        </tr>
        @if($booking->gatewayObj)
            <tr>
                <td class="label">{{__('Payment method')}}</td>
                <td class="val">{{$booking->gatewayObj->getOption('name')}}</td>
            </tr>
        @endif
        <tr>
            <td class="label">{{__('Tour name')}}</td>
            <td class="val">
                <a href="{{$service->getDetailUrl()}}">{{$translation->title}}</a>
            </td>

        </tr>
        <tr>
            @if($translation->address)
                <td class="label">{{__('Address')}}</td>
                <td class="val">
                    {{$translation->address}}
                </td>
            @endif
        </tr>
        @if($booking->start_date && $booking->end_date)
            <tr>
                <td class="label">{{__('Start date')}}</td>
                <td class="val">{{display_date($booking->start_date)}}</td>
            </tr>

            <tr>
                <td class="label">{{__('Duration:')}}</td>
                <td class="val">
                    {{human_time_diff($booking->end_date,$booking->start_date)}}
                </td>
            </tr>
        @endif

        @php $person_types = $booking->getJsonMeta('person_types')
        @endphp

        @if(!empty($person_types))
            @foreach($person_types as $type)
                <tr>
                    <td class="label">{{$type['name']}}:</td>
                    <td class="val">
                        <strong>{{$type['number']}}</strong>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="label">{{__("Guests")}}:</td>
                <td class="val">
                    <strong>{{$booking->total_guests}}</strong>
                </td>
            </tr>
        @endif
        <tr>
            <td class="label">{{__('Pricing')}}</td>
            <td class="val no-r-padding">
                <table class="pricing-list" width="100%">
                    @php $person_types = $booking->getJsonMeta('person_types')
                    @endphp

                    @if(!empty($person_types))
                        @foreach($person_types as $type)
                            <tr>
                                <td class="label">{{$type['name']}}: {{$type['number']}} * {{format_money($type['price'])}}</td>
                                <td class="val no-r-padding">
                                    <strong>{{format_money($type['price'] * $type['number'])}}</strong>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="label">{{__("Guests")}}: {{$booking->total_guests}} {{format_money($booking->getMeta('base_price'))}}</td>
                            <td class="val no-r-padding">
                                <strong>{{format_money($booking->getMeta('base_price') * $booking->total_guests)}}</strong>
                            </td>
                        </tr>
                    @endif

                    @php $extra_price = $booking->getJsonMeta('extra_price')@endphp

                    @if(!empty($extra_price))
                        <tr>
                            <td colspan="2" class="label-title"><strong>{{__("Extra Prices:")}}</strong></td>
                        </tr>
                        <tr class="">
                            <td colspan="2" class="no-r-padding no-b-border">
                                <table width="100%">
                                @foreach($extra_price as $type)
                                    <tr>
                                        <td class="label">{{$type['name']}}:</td>
                                        <td class="val no-r-padding">
                                            <strong>{{format_money($type['total'] ?? 0)}}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                                </table>
                            </td>
                        </tr>

                    @endif

                    @php $discount_by_people = $booking->getJsonMeta('discount_by_people')
                    @endphp
                    @if(!empty($discount_by_people))
                        <tr>
                            <td colspan="2" class="label-title"><strong>{{__("Discounts:")}}</strong></td>
                        </tr>
                        <tr class="">
                            <td colspan="2" class="no-r-padding no-b-border">
                                <table width="100%">
                                @foreach($discount_by_people as $type)
                                    <tr>
                                        <td class="label">
                                            @if(!$type['to'])
                                                {{__('from :from guests',['from'=>$type['from']])}}
                                            @else
                                                {{__(':from - :to guests',['from'=>$type['from'],'to'=>$type['to']])}}
                                            @endif
                                            :
                                        </td>
                                        <td class="val no-r-padding">
                                            <strong>- {{format_money($type['total'] ?? 0)}}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                                </table>
                            </td>
                        </tr>
                    @endif
                    @if(!empty($booking->buyer_fees))
                        @php
                            $buyer_fees = json_decode($booking->buyer_fees , true);
                            foreach ($buyer_fees as $buyer_fee){
                                $fee_price = $buyer_fee['price'];
                                if(!empty($buyer_fee['type']) or $buyer_fee['type'] == "percent"){
                                    $fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
                                }
                        @endphp
                        <tr>
                            <td class="label">
                                {{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
                                <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>
                                @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                    : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                                @endif
                            </td>
                            <td class="val">
                                @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                    {{ format_money( $fee_price * $booking->total_guests ) }}
                                @else
                                    {{ format_money( $fee_price ) }}
                                @endif
                            </td>
                        </tr>
                        @php } @endphp
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td class="label fsz21">{{__('Total')}}</td>
            <td class="val fsz21"><strong style="color: #FA5636">{{format_money($booking->total)}}</strong></td>
        </tr>
        <tr>
            <td class="label fsz21">{{__('Paid')}}</td>
            <td class="val fsz21"><strong style="color: #FA5636">{{format_money($booking->paid)}}</strong></td>
        </tr>
        @if($booking->total > $booking->paid)
            <tr>
                <td class="label fsz21">{{__('Remain')}}</td>
                <td class="val fsz21"><strong style="color: #FA5636">{{format_money($booking->total - $booking->paid)}}</strong></td>
            </tr>
        @endif
    </table>
</div>
<div class="text-center mt20">
    <a href="{{ route("user.booking_history") }}" target="_blank" class="btn btn-primary manage-booking-btn">{{__('Manage Bookings')}}</a>
</div>
