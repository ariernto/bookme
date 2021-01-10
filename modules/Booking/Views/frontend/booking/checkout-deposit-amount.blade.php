@if(auth()->check() && floatval($booking->deposit) && $booking->status == 'draft')
        <hr/>
        <div class="form-group-item" data-condition="enable_deposit_amount:is(1)">
            <h5 class="form-section-title">{{__("Credit want to pay?")}}</h5>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{__('Credit')}} {{ !empty(auth()->user()) ? auth()->user()->balance : 0  }}</span>
                </div>
                <input type="number" class="form-control deposit_amount" value="0" name="credit">
                <div class="input-group-append">
                    <span class="input-group-text convert_deposit_amount">{{format_money(0)}}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between"><h5 class="form-section-title">{{__("Pay now")}}:</h5> <div class="val convert_pay_now">{{format_money($booking->deposit)}}</div></div>

        </div>
@endif
