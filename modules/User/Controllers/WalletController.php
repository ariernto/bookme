<?php


namespace Modules\User\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Booking\Models\Payment;
use Modules\FrontendController;
use Modules\User\Events\RequestCreditPurchase;
use Modules\User\Models\Wallet\DepositPayment;

class WalletController extends FrontendController
{
    public function wallet()
    {
        if( setting_item('wallet_module_disable')){
            return redirect(route("user.profile.index"));
        }
        $row = auth()->user();
        $data = [
            'row'=>$row,
            'page_title'         => __("Wallet"),
            'breadcrumbs'        => [
                [
                    'name'  => __('Wallet'),
                    'class' => 'active'
                ]
            ],
            'transactions'=>$row->transactions()->with(['payment','author'])->orderBy('id','desc')->paginate(15)
        ];
        return view('User::frontend.wallet.index',$data);
    }
    public function buy(){
        if( setting_item('wallet_module_disable')){
            return redirect(route("user.profile.index"));
        }
        $row = auth()->user();
        $booking = new \Modules\Booking\Controllers\BookingController();
        $data = [
            'row'=>$row,
            'page_title'         => __("Buy credits"),
            'breadcrumbs'        => [
                [
                    'name'  => __('Wallet'),
                    'url'=>route('user.wallet')
                ],
                [
                    'name'  => __('Buy credits'),
                    'class' => 'active'
                ],
            ],
            'wallet_deposit_lists'=>setting_item_array('wallet_deposit_lists',[]),
            'gateways'=>$booking->getGateways()
        ];

        return view('User::frontend.wallet.buy',$data);
    }

    public function buyProcess(Request $request){
        if( setting_item('wallet_module_disable')){
            return redirect(route("user.profile.index"));
        }
        $row = auth()->user();
        $rules = [];
        $message = [];
        if(setting_item('wallet_deposit_type') == 'list'){
            $rules['deposit_option'] = 'required';
        }else{
            $rules['deposit_amount'] = 'required';
        }

        $payment_gateway = $request->input('payment_gateway');
        $gateways = get_payment_gateways();
        if (empty($payment_gateway)) {
            return redirect()->back()->with("error",__("Please select payment gateway"));
        }
        if (empty($payment_gateway) or empty($gateways[$payment_gateway]) or !class_exists($gateways[$payment_gateway])) {
            return redirect()->back()->with("error",__("Payment gateway not found"));
        }
        $gatewayObj = new $gateways[$payment_gateway]($payment_gateway);
        if (!$gatewayObj->isAvailable()) {
            return redirect()->back()->with("error",__("Payment gateway is not available"));
        }
        if($gRules = $gatewayObj->getValidationRules()){
            $rules = array_merge($rules,$gRules);
        }
        if($gMessages = $gatewayObj->getValidationMessages()){
            $message = array_merge($message,$gMessages);
        }
        $rules['payment_gateway'] = 'required';
        $rules['term_conditions'] = 'required';

        $validator = Validator::make($request->all(), $rules,$message);
        if ($validator->fails()) {
            if(is_array($validator->errors()->messages())){
                $msg = '';
                foreach($validator->errors()->messages() as $oneMessage){
                    $msg .= implode('<br/>',$oneMessage).'<br/>';
                }
                return redirect()->back()->with('error', $msg );
            }
            return redirect()->back()->with('error', $validator->errors() );
        }

        $deposit_option = [];

        if(setting_item('wallet_deposit_type') == 'list'){
            $wallet_deposit_lists = setting_item_array('wallet_deposit_lists',[]);
            $deposit_option = $request->input('deposit_option');
            if(empty($wallet_deposit_lists[$deposit_option])){
                return redirect()->back()->with("error",__("Deposit option is not valid"));
            }
            if(empty($wallet_deposit_lists[$deposit_option]['amount'])){
                return redirect()->back()->with("error",__("Deposit option amount is not valid"));
            }
            if(empty($wallet_deposit_lists[$deposit_option]['credit'])){
                return redirect()->back()->with("error",__("Deposit option credit is not valid"));
            }
            $deposit_amount = $wallet_deposit_lists[$deposit_option]['amount'];
            $deposit_credit = $wallet_deposit_lists[$deposit_option]['credit'];
            $deposit_option = $wallet_deposit_lists[$deposit_option];
        }else{
            $deposit_amount = $request->input('deposit_amount');
            $deposit_credit = $deposit_amount * setting_item('wallet_deposit_rate',1);
            if($deposit_amount < 0){
                return redirect()->back()->with("error",__("Deposit option credit is not valid"));
            }
        }

        $payment = new DepositPayment();
        $payment->object_model = 'wallet_deposit';
        $payment->object_id = $row->id;
        $payment->status = 'draft';
        $payment->payment_gateway = $payment_gateway;
        $payment->amount = $deposit_amount;
        $payment->meta = json_encode([
            'credit'=>$deposit_credit,
            'deposit_option'=>$deposit_option
        ]);

        $payment->save();

        $res = $gatewayObj->processNormal($payment);

        $success = $res[0] ?? null;
        $message = $res[1] ?? null;
        $redirect_url = $res[2] ?? null;

        if($success){
            $transaction = $row->deposit($deposit_credit,[],false);
            $transaction->payment_id = $payment->id;
            $transaction->save();

            $payment->wallet_transaction_id = $transaction->id;
            $payment->save();
            if(empty($redirect_url) and $payment->status == 'completed'){
                // Send Email
                //$payment->sendNewPurchaseEmail();
            }
            event(new RequestCreditPurchase($row, $payment));
        }

        if($success and $payment->status == 'completed') $redirect_url = route('user.wallet');
        if($redirect_url){
            return redirect()->to($redirect_url)->with($success ? "success" : "error",$message);
        }
        return redirect()->back()->with($success ? "success" : "error",$message);
    }
}
