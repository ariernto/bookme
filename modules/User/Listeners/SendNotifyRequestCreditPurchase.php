<?php

    namespace Modules\User\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use Modules\User\Events\NewVendorRegistered;
    use Modules\User\Events\RequestCreditPurchase;
    use Modules\User\Events\VendorApproved;

    class SendNotifyRequestCreditPurchase
    {

        public function handle(RequestCreditPurchase $event)
        {
            $user = $event->user;
            $payment = $event->payment;
            $data = [
                'id' =>  $user->id,
                'event'=>'RequestCreditPurchase',
                'to'=>'admin',
                'name' =>  $user->display_name,
                'avatar' =>  $user->avatar_url,
                'link' => route('user.admin.wallet.report'),
                'type' => 'wallet_request',
                'message' => __(':name has requested a Credit Purchase : :amount', ['name' => $user->display_name, 'amount' => $payment->amount])
            ];

            $user->notify(new AdminChannelServices($data));
        }
    }
