<?php

namespace Modules\User\Listeners;

use App\Notifications\AdminChannelServices;
use App\Notifications\PrivateChannelServices;
use App\User;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\RequestCreditPurchase;
use Modules\User\Events\UserSubscriberSubmit;
use Modules\User\Events\VendorApproved;

class UserSubscriberSubmitListeners
{

    public function handle(UserSubscriberSubmit $event)
    {
        $subscriber = $event->subscriber;
        $data = [
            'id' =>  $subscriber->id,
            'event'=>'UserSubscriberSubmit',
            'to'=>'admin',
            'name' =>  __('Someone'),
            'avatar' =>  '',
            'link' => route('user.admin.subscriber.index'),
            'type' => 'subscriber',
            'message' => __('You have just gotten a new Subscriber')
        ];

        $user = User::whereHas("roles", function($q){ $q->where("name", "administrator"); })->first();
        $user->notify(new AdminChannelServices($data));
    }
}
