<?php

    namespace Modules\Booking\Listeners;

    use App\Notifications\AdminChannelServices;
    use App\Notifications\PrivateChannelServices;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Booking\Events\BookingCreatedEvent;

    class BookingCreatedListen
    {
        public function handle(BookingCreatedEvent $event)
        {
            $booking = $event->booking;
            $booking->sendNewBookingEmails();

            $data = [
                'id'      => $booking->id,
                'event'   => 'BookingCreatedEvent',
                'to'      => 'admin',
                'name'    => Auth::user()->display_name,
                'avatar'  => Auth::user()->avatar_url,
                'link'    => route('report.admin.booking'),
                'type'    => $booking->object_model,
                'message' => __(':name has created new Booking', ['name' => Auth::user()->display_name])
            ];

            //to Admin
            Auth::user()->notify(new AdminChannelServices($data));
            //to Vendor
            $vendor = User::where('id', $booking->vendor_id)->where('status', 'publish')->first();
            if ($vendor and !$vendor->hasAnyPermission(['dashboard_access'])) {
                $data['link'] = route('vendor.bookingReport');
                $data['to'] = 'vendor';
                $vendor->notify(new PrivateChannelServices($data));
            }
        }
    }
