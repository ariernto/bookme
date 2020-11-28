<?php
namespace Modules\User\Emails;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVerificationSubmitToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    protected $email_type;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $subject = __('[:site_name] An user submitted verification data',['site_name'=>setting_item('site_title')]);

        return $this->subject($subject)->view('User::emails.user-submit-verify-data')->with([
            'user' => $this->user,
        ]);
    }
}
