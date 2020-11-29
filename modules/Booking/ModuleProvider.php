<?php
namespace Modules\Booking;

use Illuminate\Support\Facades\Event;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\Booking\Events\SetPaidAmountEvent;
use Modules\Booking\Events\TestEvent;
use Modules\Booking\Listeners\BookingCreatedListen;
use Modules\Booking\Listeners\BookingUpdateListen;
use Modules\Booking\Listeners\SetPaidAmountListen;
use Modules\Booking\Listeners\TestEventListen;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        Event::listen(BookingCreatedEvent::class,BookingCreatedListen::class);
        Event::listen(BookingUpdatedEvent::class,BookingUpdateListen::class);
        Event::listen(SetPaidAmountEvent::class,SetPaidAmountListen::class);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

}
