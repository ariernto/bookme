<?php

    namespace Modules\Vendor\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Vendor\Events\PayoutRequestEvent;

    class PayoutNotifyListener
    {

        public function handle(PayoutRequestEvent $event)
        {
            $user = $event->user;
            $action = $event->action;

            $data = [
                'id'      => $user->id,
                'event'   => 'PayoutRequestEvent',
                'to'      => 'vendor',
                'name'    => $user->display_name,
                'avatar'  => $user->avatar_url,
                'link'    => route('vendor.payout.index'),
                'type'    => 'user_verification_request',
                'message' => __('Administrator has :action your PAYOUT request', ['action' => $action])
            ];

            if ($action == "insert") {
                $data['to'] = 'admin';
                $data['link'] = route('vendor.admin.payout.index');
                $data['message'] = __(':name has sent a Payout request', ['name' => $user->display_name]);
                $user->notify(new AdminChannelServices($data));
            } else {
                if (!$user->hasAnyPermission(['dashboard_access'])) {
                    $user->notify(new PrivateChannelServices($data));
                }
            }

        }


    }
