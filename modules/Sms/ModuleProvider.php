<?php
namespace Modules\Sms;
use Illuminate\Support\Facades\Event;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\ModuleServiceProvider;
use Modules\Sms\Core\SmsServiceProvider;
use Modules\Sms\Listeners\SendSmsBookingListen;
use Modules\Sms\Listeners\SendSmsUpdateBookingListen;

class ModuleProvider extends ModuleServiceProvider
{

	public function register()
	{
		$this->app->register(SmsServiceProvider::class);

	}
	public function boot(){
		Event::listen(BookingCreatedEvent::class,SendSmsBookingListen::class);
		Event::listen(BookingUpdatedEvent::class,SendSmsUpdateBookingListen::class);
	}
}
