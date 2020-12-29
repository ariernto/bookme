<?php
namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;

class  UserSubscriberSubmit
{
    use SerializesModels;
    public $subscriber;

    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }
}
