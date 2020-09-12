<?php
namespace Modules\User\Emails;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminUpdateVerifyDataToUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    protected $email_type;
    protected $is_full;

    public function __construct(User $user,$is_full)
    {
        $this->user = $user;
        $this->is_full = $is_full;
    }

    public function build()
    {
        $subject = __('[:site_name] We updated your verification data',['site_name'=>setting_item('site_title')]);

        return $this->subject($subject)->view('User::emails.admin-submit-verify-data')->with([
            'user' => $this->user,
            'is_full' => $this->is_full
        ]);
    }
}
