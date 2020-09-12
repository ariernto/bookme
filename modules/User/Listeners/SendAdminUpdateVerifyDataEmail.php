<?php

namespace Modules\User\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\User\Emails\AdminUpdateVerifyDataToUser;
use Modules\User\Emails\RegisteredEmail;
use Modules\User\Emails\UserVerificationSubmitToAdmin;
use Modules\User\Emails\VendorApprovedEmail;
use Modules\User\Events\AdminUpdateVerificationData;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Events\UserVerificationSubmit;
use Modules\User\Events\VendorApproved;
use Modules\User\Models\User;
use Modules\Vendor\Models\VendorRequest;

class SendAdminUpdateVerifyDataEmail
{

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param $event AdminUpdateVerificationData
     * @return void
     */
    public function handle(AdminUpdateVerificationData $event)
    {
        Mail::to($event->user->email)->send(new AdminUpdateVerifyDataToUser($event->user,$event->is_update_full));

    }

}
