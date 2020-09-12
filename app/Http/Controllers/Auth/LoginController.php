<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserMeta;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Matrix\Exception;
use Modules\User\Events\SendMailUserRegistered;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->hasPermissionTo('dashboard_access')){
            return '/admin';
        }else{
            return $this->redirectTo;
        }
    }

    public function showLoginForm()
    {
        return view('auth.login',['page_title'=> __("Login")]);
    }

    public function socialLogin($provider)
    {
        $this->initConfigs($provider);
        return Socialite::driver($provider)->redirect();
    }

    protected function initConfigs($provider)
    {
        switch($provider){
            case "facebook":
            case "google":
            case "twitter":
                config()->set([
                    'services.'.$provider.'.client_id'=>setting_item($provider.'_client_id'),
                    'services.'.$provider.'.client_secret'=>setting_item($provider.'_client_secret'),
                    'services.'.$provider.'.redirect'=>'/social-callback/'.$provider,
                ]);
            break;
        }
    }

    public function socialCallBack($provider)
    {
        try {
            $this->initConfigs($provider);

            $user = Socialite::driver($provider)->user();

            if (empty($user)) {
                return redirect()->to('login')->with('error', __('Can not authorize'));
            }

            $existUser = User::getUserBySocialId($provider, $user->getId());

            if (empty($existUser)) {

                $meta = UserMeta::query()->where('name', 'social_' . $provider . '_id')->where('val', $user->getId())->first();
                if (!empty($meta)) {
                    $meta->delete();
                }

                if (empty($user->getEmail())) {
                    return redirect()->route('login')->with('error', __('Can not get email address from your social account'));
                }

                $userByEmail = User::query()->where('email', $user->getEmail())->first();
                if (!empty($userByEmail)) {
                    return redirect()->route('login')->with('error', __('Email :email exists. Can not register new account with your social email', ['email' => $user->getEmail()]));
                }

                // Create New User
                $realUser = new User();
                $realUser->email = $user->getEmail();
                $realUser->password = Hash::make(uniqid() . time());
                $realUser->name = $user->getName();
                $realUser->first_name = $user->getName();
                $realUser->status = 'publish';

                $realUser->save();

                $realUser->addMeta('social_' . $provider . '_id', $user->getId());
                $realUser->addMeta('social_' . $provider . '_email', $user->getEmail());
                $realUser->addMeta('social_' . $provider . '_name', $user->getName());
                $realUser->addMeta('social_' . $provider . '_avatar', $user->getAvatar());
                $realUser->addMeta('social_meta_avatar', $user->getAvatar());

                $realUser->assignRole('customer');

                try {
                    event(new SendMailUserRegistered($realUser));
                } catch (Exception $exception) {
                    Log::warning("SendMailUserRegistered: " . $exception->getMessage());
                }

                // Login with user
                Auth::login($realUser);

                return redirect('/');

            } else {

                if ($existUser->deleted == 1) {
                    return redirect()->route('login')->with('error', __('User blocked'));
                }
                if (in_array($existUser->status, ['blocked'])) {
                    return redirect()->route('login')->with('error', __('Your account has been blocked'));
                }

                Auth::login($existUser);

                return redirect('/');
            }
        }catch (\Exception $exception)
        {
            $message = $exception->getMessage();
            if(empty($message) and request()->get('error_message')) $message = request()->get('error_message');
            if(empty($message)) $message = $exception->getCode();

            return redirect()->route('login')->with('error',$message);
        }
    }


}
