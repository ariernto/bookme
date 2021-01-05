<?php


namespace Modules\Booking\Controllers;


use Illuminate\Http\Request;

class NormalCheckoutController extends BookingController
{
    public function showInfo(){
        return view("Booking::frontend.normal-checkout.info");
    }
    public function confirmPayment(Request $request, $gateway)
    {
        $gateways = get_payment_gateways();
        if (empty($gateways[$gateway]) or !class_exists($gateways[$gateway])) {
            return $this->sendError(__("Payment gateway not found"));
        }
        $gatewayObj = new $gateways[$gateway]($gateway);
        if (!$gatewayObj->isAvailable()) {
            return $this->sendError(__("Payment gateway is not available"));
        }
        $res = $gatewayObj->confirmNormalPayment($request);
        $status = $res[0] ?? null;
        $message = $res[1] ?? null;
        $redirect_url = $res[2] ?? null;

        if(empty($redirect_url)) $redirect_url = route('gateway.info');

        return redirect()->to($redirect_url)->with($status ? "success" : "error",$message);

    }

    public function sendError($message, $data = [])
    {
        return  redirect()->to(route('gateway.info'))->with('error',$message);
    }

    public function cancelPayment(Request $request, $gateway)
    {

        $gateways = get_payment_gateways();
        if (empty($gateways[$gateway]) or !class_exists($gateways[$gateway])) {
            return $this->sendError(__("Payment gateway not found"));
        }
        $gatewayObj = new $gateways[$gateway]($gateway);
        if (!$gatewayObj->isAvailable()) {
            return $this->sendError(__("Payment gateway is not available"));
        }
        $res =  $gatewayObj->cancelNormalPayment($request);
        $status = $res[0] ?? null;
        $message = $res[1] ?? null;
        $redirect_url = $res[2] ?? null;

        if(empty($redirect_url)) $redirect_url = route('gateway.info');

        return redirect()->to($redirect_url)->with($status ? "success" : "error",$message);
    }
}
