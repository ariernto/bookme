<?php

    namespace Modules\User\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use Modules\User\Events\NewVendorRegistered;
    use Modules\User\Events\VendorApproved;

    class SendNotifyApproved
    {

        public function handle(VendorApproved $event)
        {
            $user = $event->user;
            $data = [
                'id' =>  $user->id,
                'event'   => 'VendorApproved',
                'to'      => 'vendor',
                'name' =>  $user->display_name,
                'avatar' =>  $user->avatar_url,
                'link' => route("vendor.dashboard"),
                'type' => 'user_upgrade_request',
                'message' => __('Your upgrade request has approved already')
            ];

            $user->notify(new PrivateChannelServices($data));
        }
    }
