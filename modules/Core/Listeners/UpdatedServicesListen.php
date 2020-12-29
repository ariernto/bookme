<?php

    namespace Modules\Core\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Core\Events\UpdatedServiceEvent;

    class UpdatedServicesListen
    {
        public function handle(UpdatedServiceEvent $event)
        {
            $services = $event->services;
            $updatedBy = User::where('id',$services->update_user)->first();
            $data = [
                'id'      => $services->id,
                'event'   => 'UpdatedServiceEvent',
                'to'      => 'admin',
                'name'    => Auth::user()->display_name,
                'avatar'  => Auth::user()->avatar_url,
                'link'    => get_link_detail_services($services->type, $services->id, 'index'),
                'type'    => $services->type,
                'message' => __(':title was updated the :status status by :by', ['title' => $services->title, 'status' => $services->status,'by'=>$updatedBy->display_name])
            ];
            Auth::user()->notify(new AdminChannelServices($data));
            // notify to vendor
            $vendor = User::where('id', $services->create_user)->where('status', 'publish')->first();
            if ($vendor and Auth::id() != $services->create_user) {
                $data['to'] = 'vendor';
                $data['link'] = get_link_vendor_detail_services($services->type, $services->id, 'index');
                $vendor->notify(new PrivateChannelServices($data));
            }
        }
    }
