<?php
    namespace Modules\Booking\Listeners;
    use Modules\Booking\Events\BookingUpdatedEvent;

    class BookingUpdateListen
    {
        public function handle(BookingUpdatedEvent $event)
        {
            $booking = $event->booking;
            $booking->sendStatusUpdatedEmails();
        }
    }
