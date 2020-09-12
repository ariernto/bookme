jQuery(document).ready(function ($) {
    'use strict';
    var stripePublishKey = bookingCore_gateways_stripe.stripe_publishable_key;
    if (bookingCore_gateways_stripe.stripe_enable_sandbox === "1") {
        stripePublishKey = bookingCore_gateways_stripe.stripe_test_publishable_key;
    }
    if (stripePublishKey === '') {
        return false;
    }

    var stripe = Stripe(stripePublishKey);
    var elements = stripe.elements();
    var elementStyles = {
        base: {
            fontWeight: 500,
            fontSize: '14px',
        },
    };
    var elementClasses = {
        focus: 'is-focused',
        empty: 'is-empty',
        invalid: 'invalid',
    };

    var cardNumber = elements.create('cardNumber', {
        style: elementStyles,
        classes: elementClasses,
    });
    cardNumber.mount('#bravo_card_number');

    var cardExpiry = elements.create('cardExpiry', {
        style: elementStyles,
        classes: elementClasses,
    });
    cardExpiry.mount('#bravo_stripe_card_expiry');

    var cardCvc = elements.create('cardCvc', {
        style: elementStyles,
        classes: elementClasses,
    });
    cardCvc.mount('#bravo_stripe_card_cvc');

    cardNumber.on('change', function (event) {
        tokenRequest();
    });
    cardExpiry.on('change', function (event) {
        tokenRequest();
    });
    cardCvc.on('change', function (event) {
        tokenRequest();
    });

    var tokenRequest = function () {
        var name = $('#bravo_card_name').val();
        var address1 = $('#form-checkout input[name="address_line_1"]').val();
        var city = $('#form-checkout input[name="city"]').val();
        var state = $('#form-checkout input[name="state"]').val();
        var zip = $('#form-checkout input[name="zip_code"]').val();
        var extraDetails = {
            name: name ? name : undefined,
            address_line1: address1 ? address1 : undefined,
            address_city: city ? city : undefined,
            address_state: state ? state : undefined,
            address_zip: zip ? zip : undefined,
            account_holder_name: name ? name : undefined,
            account_holder_type: 'individual',
        };
        stripe.createToken(cardNumber, extraDetails).then(function (result) {
            if (result.token) {
                $("#bravo_stripe_token").val(result.token.id);
            }
        });
    };
});