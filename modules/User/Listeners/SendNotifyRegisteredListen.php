<?php

    namespace Modules\User\Listeners;

    use App\Notifications\AdminChannelServices;
    use Illuminate\Support\Facades\Auth;
    use Modules\User\Events\SendMailUserRegistered;
    use Modules\User\Models\User;

    class SendNotifyRegisteredListen
    {

        public function handle(SendMailUserRegistered $event)
        {
            $user = $event->user;
            $data = [
                'id' =>  $user->id,
                'event'=>'SendMailUserRegistered',
                'to'=>'admin',
                'name' =>  $user->display_name,
                'avatar' =>  $user->avatar_url,
                'link' => route('user.admin.index', ['s' => $user->id] ),
                'type' => 'user',
                'message' => $user->display_name.__(' has been registered')
            ];

            Auth::user()->notify(new AdminChannelServices($data));
        }

    }
