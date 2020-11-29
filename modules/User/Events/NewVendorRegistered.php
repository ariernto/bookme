<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/23/2019
 * Time: 10:33 PM
 */
namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;

class  NewVendorRegistered
{
    use SerializesModels;
    public $user;
    public $upgrade_request;

    public function __construct($user,$upgrade_request)
    {
        $this->user = $user;
        $this->upgrade_request = $upgrade_request;
    }
}