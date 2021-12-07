<?php
    namespace Modules\Booking\Listeners;
    use Modules\Booking\Events\BookingCreatedEvent;

    class BookingCreatedListen
    {
        public function handle(BookingCreatedEvent $event)
        {
            $booking = $event->booking;
            $booking->sendNewBookingEmails();
        }
    }
