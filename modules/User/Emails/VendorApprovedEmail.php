<?php

namespace Modules\User\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\User\Events\VendorApproved;

class VendorApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    const CODE = [
        'buttonReset' => '[button_reset_password]',
    ];
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $subject = __('Vendor Registration Approved');

        return $this->subject($subject)->view('User::emails.vendor-approved',['user'=>$this->user]);
    }


}
