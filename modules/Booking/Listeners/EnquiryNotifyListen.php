<?php
namespace Modules\Booking\Listeners;

use App\Notifications\PrivateChannelServices;
use App\User;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Emails\EnquirySendEmail;
use Modules\Booking\Events\EnquirySendEvent;
use Illuminate\Support\Facades\Mail;


class EnquiryNotifyListen
{
    /**
     * Handle the event.
     *
     * @param EnquirySendEvent $event
     * @return void
     */
    public function handle(EnquirySendEvent $event)
    {
        $enquiry = $event->enquiry;
        $service = $enquiry->service;

        $data = [
            'id' =>  $service->id,
            'event'=>'EnquirySendEvent',
            'to'=>'vendor',
            'name' =>  Auth::user()->display_name,
            'avatar' =>  Auth::user()->avatar_url,
            'link' => route('vendor.enquiry_report'),
            'type' => 'enquiry',
            'message' => __(':name has sent a Enquiry for :title', ['name' => Auth::user()->display_name, 'title' => $service->title])
        ];

        $vendor = User::where('id', $enquiry->vendor_id)->where('status', 'publish')->first();
        if($vendor){
            $vendor->notify(new PrivateChannelServices($data));
        }
    }
}
