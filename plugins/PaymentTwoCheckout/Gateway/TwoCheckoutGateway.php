<?php
namespace Plugins\PaymentTwoCheckout\Gateway;

use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Models\Payment;
use Validator;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Models\Booking;

class TwoCheckoutGateway extends \Modules\Booking\Gateways\BaseGateway
{
    protected $id   = 'two_checkout_gateway';
    public    $name = 'Two Checkout';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Two Checkout?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("Two Checkout"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'input',
                'id'    => 'twocheckout_account_number',
                'label' => __('Account Number'),
            ],
            [
                'type'  => 'input',
                'id'    => 'twocheckout_secret_word',
                'label' => __('Secret Word'),
            ],
            [
                'type'  => 'checkbox',
                'id'    => 'twocheckout_enable_sandbox',
                'label' => __('Enable Sandbox Mode'),
            ]
        ];
    }

    public function process(Request $request, $booking, $service)
    {
        if (in_array($booking->status, [
            $booking::PAID,
            $booking::COMPLETED,
            $booking::CANCELLED
        ])) {

            throw new Exception(__("Booking status does need to be paid"));
        }
        if (!$booking->total) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }
        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_gateway = $this->id;
        $payment->status = 'draft';
        $payment->save();
        $data = $this->handlePurchaseData([], $booking, $request);
        $booking->status = $booking::UNPAID;
        $booking->payment_id = $payment->id;
        $booking->save();
        if ($this->getOption('twocheckout_enable_sandbox')) {
            $checkout_url_sandbox = 'https://sandbox.2checkout.com/checkout/purchase';
        } else {
            $checkout_url_sandbox = 'https://www.2checkout.com/checkout/purchase';
        }
        $twoco_args = http_build_query($data, '', '&');
        response()->json([
            'url' => $checkout_url_sandbox . "?" . $twoco_args
        ])->send();
    }

    public function processNormal($payment)
    {
        $payment->payment_gateway = $this->id;
        $data = $this->handlePurchaseDataNormal($payment,\request());

        if ($this->getOption('twocheckout_enable_sandbox')) {
            $checkout_url_sandbox = 'https://sandbox.2checkout.com/checkout/purchase';
        } else {
            $checkout_url_sandbox = 'https://www.2checkout.com/checkout/purchase';
        }
        $twoco_args = http_build_query($data, '', '&');

        return [true,'',$checkout_url_sandbox . "?" . $twoco_args];
    }

    public function handlePurchaseData($data, $booking, $request)
    {
        $twocheckout_args = array();
        $twocheckout_args['sid'] = $this->getOption('twocheckout_account_number');
        $twocheckout_args['paypal_direct'] = 'Y';
        $twocheckout_args['cart_order_id'] = $booking->code;
        $twocheckout_args['merchant_order_id'] = $booking->code;
        $twocheckout_args['total'] = (float)$booking->pay_now;
        $twocheckout_args['return_url'] = $this->getCancelUrl() . '?c=' . $booking->code;
        $twocheckout_args['x_receipt_link_url'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $twocheckout_args['currency_code'] = setting_item('currency_main');
        $twocheckout_args['card_holder_name'] = $request->input("first_name") . ' ' . $request->input("last_name");
        $twocheckout_args['street_address'] = $request->input("address_line_1");
        $twocheckout_args['street_address2'] = $request->input("address_line_1");
        $twocheckout_args['city'] = $request->input("city");
        $twocheckout_args['state'] = $request->input("state");
        $twocheckout_args['country'] = $request->input("country");
        $twocheckout_args['zip'] = $request->input("zip_code");
        $twocheckout_args['phone'] = "";
        $twocheckout_args['email'] = $request->input("email");
        $twocheckout_args['lang'] = app()->getLocale();
        return $twocheckout_args;
    }
    public function handlePurchaseDataNormal($payment, $request)
    {
        $twocheckout_args = array();
        $twocheckout_args['sid'] = $this->getOption('twocheckout_account_number');
        $twocheckout_args['paypal_direct'] = 'Y';
        $twocheckout_args['cart_order_id'] = $payment->code;
        $twocheckout_args['merchant_order_id'] = $payment->code;
        $twocheckout_args['total'] = (float)$payment->amount;
        $twocheckout_args['return_url'] = $this->getCancelUrl(true) . '?pid=' . $payment->code;
        $twocheckout_args['x_receipt_link_url'] = $this->getReturnUrl(true) . '?pid=' . $payment->code;
        $twocheckout_args['currency_code'] = setting_item('currency_main');
//        $twocheckout_args['card_holder_name'] = $request->input("first_name") . ' ' . $request->input("last_name");
//        $twocheckout_args['street_address'] = $request->input("address_line_1");
//        $twocheckout_args['street_address2'] = $request->input("address_line_1");
//        $twocheckout_args['city'] = $request->input("city");
//        $twocheckout_args['state'] = $request->input("state");
//        $twocheckout_args['country'] = $request->input("country");
//        $twocheckout_args['zip'] = $request->input("zip_code");
//        $twocheckout_args['phone'] = "";
//        $twocheckout_args['email'] = $request->input("email");
        $twocheckout_args['lang'] = app()->getLocale();
        return $twocheckout_args;
    }


    public function getDisplayHtml()
    {
        return $this->getOption('html', '');
    }

    public function confirmPayment(Request $request)
    {
        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
            $compare_string = $this->getOption('twocheckout_secret_word') . $this->getOption('twocheckout_account_number') . $request->input("order_number") . $request->input("total");
            $compare_hash1 = strtoupper(md5($compare_string));
            $compare_hash2 = $request->input("key");
            if ($compare_hash1 != $compare_hash2) {
                $payment = $booking->payment;
                if ($payment) {
                    $payment->status = 'fail';
                    $payment->logs = \GuzzleHttp\json_encode($request->input());
                    $payment->save();
                }
                try {
                    $booking->markAsPaymentFailed();
                } catch (\Swift_TransportException $e) {
                    Log::warning($e->getMessage());
                }
                return redirect($booking->getDetailUrl())->with("error", __("Payment Failed"));
            } else {
                $payment = $booking->payment;
                if ($payment) {
                    $payment->status = 'completed';
                    $payment->logs = \GuzzleHttp\json_encode($request->input());
                    $payment->save();
                }
                try {
                    $booking->paid += (float)$booking->pay_now;
                    $booking->markAsPaid();
                } catch (\Swift_TransportException $e) {
                    Log::warning($e->getMessage());
                }
                return redirect($booking->getDetailUrl())->with("success", __("You payment has been processed successfully"));
            }
        }
        if (!empty($booking)) {
            return redirect($booking->getDetailUrl(false));
        } else {
            return redirect(url('/'));
        }
    }
    public function confirmNormalPayment()
    {
        /**
         * @var Payment $payment
         */
        $request = \request();
        $c = $request->query('pid');
        $payment = Payment::where('code', $c)->first();
        if (!empty($payment) and in_array($payment->status,['draft'])) {

            $compare_string = $this->getOption('twocheckout_secret_word') . $this->getOption('twocheckout_account_number') . $request->input("order_number") . $request->input("total");
            $compare_hash1 = strtoupper(md5($compare_string));
            $compare_hash2 = $request->input("key");
            if ($compare_hash1 == $compare_hash2) {
                return $payment->markAsCompleted();
            } else {
                return $payment->markAsFailed();
            }
        }
        return [false];
    }

    public function cancelPayment(Request $request)
    {
        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
            $payment = $booking->payment;
            if ($payment) {
                $payment->status = 'cancel';
                $payment->logs = \GuzzleHttp\json_encode([
                    'customer_cancel' => 1
                ]);
                $payment->save();

                // Refund without check status
                $booking->tryRefundToWallet(false);
            }
            return redirect($booking->getDetailUrl())->with("error", __("You cancelled the payment"));
        }
        if (!empty($booking)) {
            return redirect($booking->getDetailUrl());
        } else {
            return redirect(url('/'));
        }
    }


}
