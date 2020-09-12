<?php
namespace Plugins\PaymentTwoCheckout\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoCheckoutController extends Controller
{
    public function handleCheckout(Request $request)
    {
        if (!empty($request->input('key')) and !empty($request->input('x_receipt_link_url'))) {
            $twoco_args = http_build_query($request->input(), '', '&');
            return redirect($request->input('x_receipt_link_url') . "&" . $twoco_args);
        }
        return redirect("/");
    }
}
