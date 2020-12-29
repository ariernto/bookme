<?php

    namespace Modules\User\Listeners;

    use App\Notifications\AdminChannelServices;
    use Modules\User\Events\NewVendorRegistered;

    class SendNotifyRegistered
    {

        public function handle(NewVendorRegistered $event)
        {
            $user = $event->user;
            $data = [
                'id' =>  $user->id,
                'name' =>  $user->display_name,
                'avatar' =>  $user->avatar_url,
                'link' => route('user.admin.upgrade'),
                'type' => 'user_upgrade_request',
                'message' => __(':name has requested to become a vendor', ['name' => $user->display_name])
            ];

            $user->notify(new AdminChannelServices($data));
        }
    }
