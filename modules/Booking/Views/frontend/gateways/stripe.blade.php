<div class="card_stripe">
    <i class="icofont-ui-v-card bg"></i>
    <label>
        <span>{{__("Name on the Card")}}</span>
        <input id="bravo_card_name" name="card_name" placeholder="{{__("Card Name")}}">
    </label>
    <label>
        <span>{{__("Card Number")}}</span>
        <div id="bravo_card_number" class="input"></div>
        <i class="icofont-credit-card"></i>
    </label>
    <label class="item">
        <span>{{__("Expiration")}}</span>
        <div id="bravo_stripe_card_expiry" class="input"></div>
    </label>
    <label class="item">
        <span>{{__("CVC")}}</span>
        <div id="bravo_stripe_card_cvc" class="input"></div>
    </label>
    <input name="token" type="hidden" value="" id="bravo_stripe_token"/>
</div>