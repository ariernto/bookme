<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_settings')->insert([
                [
                    'name'  => "google_client_secret",
                    'val'   => "s6s_IWXAUXjcTg2X00UdsHC2",
                    'group' => "advance",
                ],
                [
                    'name'  => "google_client_id",
                    'val'   => "240140366958-8dddnfljlqqj4jbriv22md213lhpe7e8.apps.googleusercontent.com",
                    'group' => "advance",
                ],
                [
                    'name'  => "google_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "facebook_client_secret",
                    'val'   => "186949dbc3d6a9ee219b1e488e439be2",
                    'group' => "advance",
                ],
                [
                    'name'  => "facebook_client_id",
                    'val'   => "738807186188291",
                    'group' => "advance",
                ],
                [
                    'name'  => "facebook_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "twitter_client_id",
                    'val'   => "hVyKfgMqjd5zmF3kLuDy0v6BM",
                    'group' => "advance",
                ],
                [
                    'name'  => "twitter_client_secret",
                    'val'   => "5aQCEmrOF9tSLvFlXXKehgZqpmu5XA4fXkqLLaFEDOReFI68vD",
                    'group' => "advance",
                ],
                [
                    'name'  => "twitter_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "",
                    'val'   => "",
                    'group' => "advance",
                ],
            ]);
        // Gateways setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_paypal_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_name",
                    'val'   => "Paypal",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_test",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_convert_to",
                    'val'   => "usd",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_exchange_rate",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_test_account",
                    'val'   => "danniejpt-facilitator_api1.gmail.com",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_test_client_id",
                    'val'   => "1382325797",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_paypal_test_client_secret",
                    'val'   => "All7UELmX8cXBdqZcLFf7Nosl74eAsKiRvpoPRbVPpTqxFwEfS0ftnuU",
                    'group' => "payment",
                ]
            ]);
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_stripe_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_stripe_name",
                    'val'   => "Stripe",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_stripe_stripe_enable_sandbox",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_stripe_stripe_test_secret_key",
                    'val'   => "sk_test_lndgAdg64aanpveyTRgLBuLX",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_stripe_stripe_test_publishable_key",
                    'val'   => "pk_test_FpBteyNZzbH26o2ONNujkwoF",
                    'group' => "payment",
                ]
            ]);
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_two_checkout_gateway_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_two_checkout_gateway_name",
                    'val'   => "Two Checkout",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_two_checkout_gateway_twocheckout_enable_sandbox",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_two_checkout_gateway_twocheckout_account_number",
                    'val'   => "901414926",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_two_checkout_gateway_twocheckout_secret_word",
                    'val'   => "ZTUwMjU2NzEtNTE4Ny00N2M1LThmODYtYjE3ZWIyMjFlYTQ1",
                    'group' => "payment",
                ]
            ]);
    }
}
