<?php
    namespace Modules\Booking\Listeners;
    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Booking\Events\BookingUpdatedEvent;

    class BookingUpdateListen
    {
        public function handle(BookingUpdatedEvent $event)
        {
            $booking = $event->booking;
            $booking->sendStatusUpdatedEmails();

            $data = [
                'event'=>'BookingUpdatedEvent',
                'to'=>'admin',
                'id' =>  $booking->id,
                'name' =>  Auth::user()->display_name,
                'avatar' =>  Auth::user()->avatar_url,
                'link' => route('report.admin.booking'),
                'type' => $booking->object_model,
                'message' => __(':name has changed to :status', ['name' => $booking->service->title, 'status' => $booking->status])
            ];

            // notify admin
            Auth::user()->notify(new AdminChannelServices($data));
            // notify vendor
            $vendor = $booking->vendor()->where('status', 'publish')->first();
            if($vendor){
                if(!$vendor->hasAnyPermission(['dashboard_access'])){
                    $data['to']='vendor';
                    $data['link'] = route('vendor.bookingReport');
                    $vendor->notify(new PrivateChannelServices($data));
                }
            }
            //Always to Customer
            $customer = User::where('id',$booking->customer_id)->where('status', 'publish')->first();

            if($customer){
                if(!$customer->hasAnyPermission(['dashboard_access'])){
                    $data['to']='customer';
                    $data['link'] = route('user.booking_history');
                    $customer->notify(new PrivateChannelServices($data));
                }

            }
        }
    }
