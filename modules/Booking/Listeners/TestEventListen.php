<?php


    namespace Modules\Booking\Listeners;


    use App\Notifications\AdminChannelServices;
    use Modules\Booking\Events\TestEvent;

    class TestEventListen
    {
        public function __construct()
        {
        }
        public function handle(TestEvent $testEvent){
            $user = $testEvent->user;
            $user->notify(new AdminChannelServices('xxx', $user));
            \Log::info('TestEvent listen da duoc goi ');
        }

    }