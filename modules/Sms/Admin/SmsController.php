<?php

    namespace Modules\Sms\Admin;

    use Illuminate\Http\Request;
    use Modules\AdminController;
    use Modules\Sms\Core\Facade\Sms;
    use Propaganistas\LaravelPhone\PhoneNumber;

    class SmsController extends AdminController
    {
        public function testSms(Request $request)
        {

            $to = $request->to;
            $message = $request->message;
            $this->validate($request,[
            	'to'=>'required',
            	'message'=>'required',
            	'country'=>'required',
            ]);
            try {
				$to = (string)PhoneNumber::make($to)->ofCountry($request->country);
	            Sms::to($to)->content($message)->send();
                return response()->json(['error' => false], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'messages' => $e->getMessage()], 200);
            }
        }
    }
