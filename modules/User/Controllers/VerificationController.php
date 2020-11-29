<?php

	namespace Modules\User\Controllers;

	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Arr;
	use Illuminate\Support\Facades\Auth;
	use Modules\FrontendController;
	use Modules\Sms\Core\Facade\Sms;
	use Modules\User\Events\UserVerificationSubmit;
	use Propaganistas\LaravelPhone\PhoneNumber;


	class VerificationController extends FrontendController
	{

		public function index()
		{

			$user = Auth::user();

			$data = [
				'fields'         => $user->verification_fields,
				'only_show_data' => 1,
				'breadcrumbs'    => [
					[
						'name'  => __('Verification'),
						'class' => 'active'
					],
				],
			];

			return view('User::frontend.verification.index', $data);
		}

		public function update()
		{

			$user = Auth::user();
			$data = [
				'user'        => $user,
				'fields'      => $user->verification_fields,
				'breadcrumbs' => [
					[
						'name' => __('Verification'),
						'url'  => route('user.verification.index')
					],
					[
						'name'  => __('Update Verification Data'),
						'class' => 'active'
					],
				],
			];

			return view('User::frontend.verification.update', $data);
		}

		public function store()
		{

			/**
			 * @var $user User
			 */
			$user = Auth::user();
			$fields = $user->verification_fields;

			$rules = [];
			$messages = [];
			$input = \request()->input();
			foreach ($fields as $field) {
				if (!empty($field['required'])) {
					$rules[$field['field_id']][] = 'required';
					$messages[$field['field_id'] . '.required'] = __("The :name is required", ['name' => $field['name']]);
				}
				switch ($field['type']) {
					case "file":
						if (!empty($input[$field['field_id']])) {
							$rules[$field['field_id'] . '.path'][] = 'required';
							$messages[$field['field_id'] . '.path.required'] = __("The :name path is required", ['name' => $field['name']]);
							$input[$field['field_id']] = json_decode($input[$field['field_id']], true);
						}
						break;
					case "multi_files":
						if (!empty($input[$field['field_id']])) {
							$rules[$field['field_id'] . '.*.path'][] = 'required';
							$messages[$field['field_id'] . '.*.path.required'] = __("The :name path is required", ['name' => $field['name']]);
							foreach ($input[$field['field_id']] as $k => $val) {
								$input[$field['field_id']][$k] = json_decode($val, true);
							}
						}
						break;
				}
			}
			if (!empty($rules)) {
				\Validator::make($input, $rules, $messages)->validate();
			}
			$checkAll = false;
			foreach ($fields as $field) {
				$check = false;
				$old = $user->getVerifyData($field['id']);

				switch ($field['type']) {
					case "multi_files":
						if ($old != json_encode(\request()->input($field['field_id']))) {
							$check = true;
						}
						break;
					case "file":
					default:
						if ($old != \request()->input($field['field_id'])) {
							$check = true;
						};
						break;
				}
				if ($check) {
					$user->addMeta($field['field_id'], \request()->input($field['field_id']));
					$user->addMeta('is_verified_' . $field['id'], 0);
				}

				if ($check) $checkAll = true;

			}

			if ($checkAll) {
				$user->verify_submit_status = 'new';
				$user->is_verified = 0;
				$user->save();
				event(new UserVerificationSubmit($user));
			}

			return redirect()->back()->with('success', __("Verification data saved. Please wait for admin approval"));

		}

		public function sendCodeVerifyPhone(Request $request)
		{
			$user = Auth::user();
			$phone = $request->phone;
			$inputName = $request->inputName;
			$inputLabel = $request->inputLabel;
			if (empty($phone)) {
				return response()->json(['status' => 0, 'message' => __($inputLabel.' is required.')]);
			}
			$fields = $user->verification_fields;
			$phoneField = Arr::where($fields, function ($value, $key) use ($inputName){
				if ($value['field_id'] == $inputName and empty($value['is_verified'])) {
					return $value;
				}
			});
			if (!empty($phoneField)) {
//    		send sms
				try {
					$string = rand(100000, 999999);
					$message = __($string . ' is you verify code');
					$to = (string)PhoneNumber::make($phone)->ofCountry($user->country);
					Sms::to($to)->content($message)->send();
					$user->addMeta('verify_phone_data', [$string=>['phone'=>$phone,'inputName'=>$inputName,'inputLabel'=>$inputLabel]]);
					return response()->json(['status' => 1, 'action' => 'openModalVerify', 'phone' => $phone]);
				} catch (\Exception $e) {
					return response()->json(['status' => 0, 'action' => 'showError', 'phone' => $phone, 'message' => $e->getMessage()]);
				}
			} else {
				return response()->json(['status' => 1, 'verified' => 1, 'phone' => $phone,'message'=>__($inputLabel.' verified')]);
			}
		}

		public function verifyPhone(Request $request)
		{
			$user = Auth::user();
			$codeRequest = $request->code;
			$verifyData = json_decode($user->getMeta('verify_phone_data'),true);
			if (!empty($verifyData[$codeRequest])) {
				$data = $verifyData[$codeRequest];
				$fields = $user->verification_fields;
				$phoneField = Arr::where($fields, function ($value, $key) use ($data){
					if ($value['field_id'] == $data['inputName']) {
						return $value;
					}
				});
				if (!empty($phoneField)) {
					foreach ($phoneField as $field) {
						$user->addMeta($field['field_id'], $data['phone']);
						$user->addMeta('is_verified_' . $field['id'], 1);
					}
				}
				return response()->json(['status' => 1, 'verified' => 1]);
			} else {
				return response()->json(['status' => 0, 'verified' => 0, 'message' => __('Verify code do not match')]);
			}
		}
	}
