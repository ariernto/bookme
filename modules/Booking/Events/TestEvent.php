<?php


    namespace Modules\Booking\Events;


    use App\User;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    class TestEvent implements ShouldBroadcast
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;
        public $user;

        public function __construct(User $user)
        {
            $this->user = $user;

        }
        public function broadcastOn()
        {
            return ['admin-channel'];
        }
    }