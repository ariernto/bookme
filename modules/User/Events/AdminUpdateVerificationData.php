<?php
namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;

class  AdminUpdateVerificationData
{
    use SerializesModels;
    public $user;
    public $is_update_full;

    public function __construct($user,$is_update_full = false)
    {
        $this->user = $user;
        $this->is_update_full = $is_update_full;
    }
}
