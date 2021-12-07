<?php
namespace Modules\Api\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Modules\Template\Models\Template;
use Illuminate\Support\Facades\Validator;

class BookingController extends \Modules\Booking\Controllers\BookingController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api')->except([
            'detail','getConfigs','getHomeLayout','getTypes','checkout','doCheckout','checkStatusCheckout','confirmPayment','getGatewaysForApi',
            'thankyou'
        ]);
    }
    public function getTypes(){
        $types = get_bookable_services();

        $res = [];
        foreach ($types as $type=>$class) {
            $obj = new $class();
            $res[$type] = [
                'icon'=>call_user_func([$obj,'getServiceIconFeatured']),
                'name'=>call_user_func([$obj,'getModelName']),
                'search_fields'=>[

                ],
            ];
        }
        return $res;
    }

    public function getConfigs(){
        $languages = \Modules\Language\Models\Language::getActive();
        $template = Template::find(setting_item('api_app_layout'));
        $res = [
            'languages'=>$languages->map(function($lang){
                return $lang->only(['locale','name']);
            }),
            'booking_types'=>$this->getTypes(),
            'country'=>get_country_lists(),
            'app_layout'=>$template? json_decode($template->content,true) : [],
            'is_enable_guest_checkout'=>(int)is_enable_guest_checkout()
        ];
        return $this->sendSuccess($res);
    }

    public function getHomeLayout(){
        $res = [];
        $template = Template::find(setting_item('api_app_layout'));
        if(!empty($template)){
            $res = $template->getProcessedContentAPI();
        }
        return $this->sendSuccess(
            [
                "data"=>$res
            ]
        );
    }


    protected function validateCheckout($code){

        $booking = $this->booking::where('code', $code)->first();

        $this->bookingInst = $booking;

        if (empty($booking)) {
            abort(404);
        }

        return true;
    }

    public function detail(Request $request, $code)
    {

        $booking = Booking::where('code', $code)->first();
        if (empty($booking)) {
            return $this->sendError(__("Booking not found!"))->setStatusCode(404);
        }

        if ($booking->status == 'draft') {
            return $this->sendError(__("You do not have permission to access"))->setStatusCode(404);
        }
        $data = [
            'booking'    => $booking,
            'service'    => $booking->service,
        ];
        if ($booking->gateway) {
            $data['gateway'] = get_payment_gateway_obj($booking->gateway);
        }
        return $this->sendSuccess(
            $data
        );
    }

    protected function validateDoCheckout(){

        $request = \request();
        /**
         * @param Booking $booking
         */
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('', ['errors' => $validator->errors()]);
        }
        $code = $request->input('code');
        $booking = $this->booking::where('code', $code)->first();
        $this->bookingInst = $booking;

        if (empty($booking)) {
            abort(404);
        }

        return true;
    }

    public function checkStatusCheckout($code)
    {
        $booking = $this->booking::where('code', $code)->first();
        $data = [
            'error'    => false,
            'message'  => '',
            'redirect' => ''
        ];
        if (empty($booking)) {
            $data = [
                'error'    => true,
                'redirect' => url('/')
            ];
        }

        if ($booking->status != 'draft') {
            $data = [
                'error'    => true,
                'redirect' => url('/')
            ];
        }
        return response()->json($data, 200);
    }

    public function getGatewaysForApi(){
        $res = [];
        $gateways = $this->getGateways();
        foreach ($gateways as $gateway=>$obj){
            $res[$gateway] = [
                'logo'=>$obj->getDisplayLogo(),
                'name'=>$obj->getDisplayName(),
                'desc'=>$obj->getApiDisplayHtml(),
            ];
            if($option = $obj->getForm()){
                $res[$gateway]['form'] = $option;
            }
            if($options = $obj->getApiOptions()){
                $res[$gateway]['options'] = $options;
            }
        }

        return $this->sendSuccess($res);
    }

    public function thankyou(Request $request, $code)
    {

        $booking = Booking::where('code', $code)->first();
        if (empty($booking)) {
            abort(404);
        }

        if ($booking->status == 'draft') {
            return redirect($booking->getCheckoutUrl());
        }

        $data = [
            'page_title' => __('Booking Details'),
            'booking'    => $booking,
            'service'    => $booking->service,
        ];
        if ($booking->gateway) {
            $data['gateway'] = get_payment_gateway_obj($booking->gateway);
        }
        return view('Booking::frontend/detail', $data);
    }
}
