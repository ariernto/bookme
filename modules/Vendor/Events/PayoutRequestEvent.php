<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/23/2019
 * Time: 10:33 PM
 */
namespace Modules\Vendor\Events;

use Illuminate\Queue\SerializesModels;

class  PayoutRequestEvent
{
    use SerializesModels;
    public $user;
    public $payout_request;
    public $action;

    public function __construct($action,$payout_request)
    {
        $this->action = $action;
        $this->payout_request = $payout_request;
        $this->user = $payout_request->vendor;
    }
}