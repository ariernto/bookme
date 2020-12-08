<?php
namespace Modules\Booking\Gateways;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Events\BookingCreatedEvent;

class OfflinePaymentGateway extends BaseGateway
{
    public $name = 'Offline Payment';
    public $is_offline =  true;

    public function process(Request $request, $booking, $service)
    {
        $service->beforePaymentProcess($booking, $this);
        // Simple change status to processing

        if($booking->paid <= 0){
            $booking->status = $booking::PROCESSING;
        }else{
            if($booking->paid < $booking->total){
                $booking->status = $booking::PARTIAL_PAYMENT;
            }else{
                $booking->status = $booking::PAID;
            }
        }

        $booking->save();
        try{
            event(new BookingCreatedEvent($booking));
        } catch(\Swift_TransportException $e){
            Log::warning($e->getMessage());
        }

        $service->afterPaymentProcess($booking, $this);
        return response()->json([
            'url' => $booking->getDetailUrl()
        ])->send();
    }

    public function processNormal($payment)
    {
        $payment->status = 'processing';
        $payment->save();

        return [true,__("Thank you, we will contact you shortly")];
    }

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Offline Payment?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("Offline Payment"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
        ];
    }
}
