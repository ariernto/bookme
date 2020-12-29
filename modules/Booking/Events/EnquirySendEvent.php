<?php
namespace Modules\Booking\Events;

use Modules\Booking\Models\Booking;
use Illuminate\Queue\SerializesModels;
use Modules\Booking\Models\Enquiry;

class EnquirySendEvent
{
    use SerializesModels;
    /**
     * @var Enquiry
     */
    public $enquiry;

    public function __construct(Enquiry $enquiry)
    {

        $this->enquiry = $enquiry;
    }
}