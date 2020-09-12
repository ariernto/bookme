<?php
namespace Modules\Booking\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Enquiry;

class EnquirySendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $enquiry;
    public $content;
    protected $email_type;


    public function __construct(Enquiry $enquiry , $content ,$to = 'admin')
    {
        $this->enquiry = $enquiry;
        $this->content = $content;
        $this->email_type = $to;
    }

    public function build()
    {
        $subject = '';
        switch ($this->email_type){
            case "admin":
                $subject = __('[:site_name] New inquiry has been made',['site_name'=>setting_item('site_title')]);
            break;
            case "vendor":
                $subject = __('[:site_name] You get new inquiry request',['site_name'=>setting_item('site_title')]);
            break;
        }
        return $this->subject($subject)->view('Booking::emails.enquiry')->with([
            'enquiry' => $this->enquiry,
            'content' => $this->content,
            'to'=>$this->email_type
        ]);
    }
}
