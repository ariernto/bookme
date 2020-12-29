<?php
    namespace Modules\Core\Listeners;
    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Core\Events\CreatedServicesEvent;

    class CreatedServicesListen
    {
        public function handle(CreatedServicesEvent $event)
        {
            $services = $event->services;

            $data = [
                'id' =>  $services->id,
                'event'=>'CreatedServicesEvent',
                'to'=>'admin',
                'name' =>  Auth::user()->display_name,
                'avatar' =>  Auth::user()->avatar_url,
                'link' => get_link_detail_services($services->type, $services->id),
                'type' => $services->type,
                'message' => __(':name has created :services :title', ['name' => Auth::user()->display_name, 'services' => $services->type, 'title' => $services->title])
            ];
            // notify admin
            Auth::user()->notify(new AdminChannelServices($data));
        }
    }
