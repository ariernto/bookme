<?php
namespace Modules\Booking\Gateways;

use Illuminate\Http\Request;
use Modules\Booking\Models\Payment;

abstract class BaseGateway
{
    protected $id;
    public    $name;
    public $is_offline = false;

    public function __construct($id = false)
    {
        if ($id)
            $this->id = $id;
    }

    public function isAvailable()
    {
        return $this->getOption('enable');
    }

    public function getHtml()
    {

    }

    /**
     * @param Request $request
     * @param \Modules\Booking\Models\Booking $booking
     * @param \Modules\Booking\Models\Bookable $service
     */
    public function process(Request $request, $booking, $service)
    {

    }

    public function processNormal($payment){

    }

    public function cancelPayment(Request $request)
    {

    }

    public function confirmPayment(Request $request)
    {

    }

    public function getOptionsConfigs()
    {
        return [];
    }

    public function getOptionsConfigsFormatted()
    {
        $languages = \Modules\Language\Models\Language::getActive();
        $options = $this->getOptionsConfigs();
        if (!empty($options)) {
            foreach ($options as &$option) {
                $option['value'] = $this->getOption($option['id'], $option['std'] ?? '');
                if( !empty($option['multi_lang']) && !empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')){
                    foreach($languages as $language){
                        if( setting_item('site_locale') == $language->locale) continue;
                        $option["value_".$language->locale] = $this->getOption($option['id']."_".$language->locale, '');
                    }
                }
                $option['id'] = 'g_' . $this->id . '_' . $option['id'];
            }
        }
        return $options;
    }

    public function getOption($key, $default = '')
    {
        return setting_item('g_' . $this->id . '_' . $key, $default);
    }

    public function getDisplayName()
    {
        $locale = app()->getLocale();
        if(!empty($locale)){
            $title = $this->getOption("name_".$locale);
        }
        if(empty($title)){
            $title = $this->getOption("name" , $this->name);
        }
        return $title;
    }

    public function getDisplayHtml()
    {
        $locale = app()->getLocale();
        if(!empty($locale)){
            $html = $this->getOption("html_".$locale);
        }
        if(empty($html)){
            $html = $this->getOption("html");
        }
        return $html;
    }

    public function getReturnUrl($is_normal = false)
    {
        if($is_normal){
            return route('gateway.confirm',['gateway'=>$this->id]);
        }
        $is_api = request()->segment(1) == 'api';
        return url(($is_api ? 'api/' : '').app_get_locale(false,false,"/").config('booking.booking_route_prefix') . '/confirm/' . $this->id);
    }

    public function getCancelUrl($is_normal = false)
    {
        if($is_normal){
            return route('gateway.cancel',['gateway'=>$this->id]);
        }
        $is_api = request()->segment(1) == 'api';
        return url(($is_api ? 'api/' : '').app_get_locale(false,false,"/").config('booking.booking_route_prefix') . '/cancel/' . $this->id);
    }

    public function getDisplayLogo()
    {
        $logo_id = $this->getOption('logo_id');
        return get_file_url($logo_id);
    }

    public function getForm(){

    }
    public function getApiOptions(){

    }

    public function getApiDisplayHtml(){
        return $this->getDisplayHtml();
    }

    public function confirmNormalPayment(){

    }

    public function cancelNormalPayment()
    {
        /**
         * @var Payment $payment
         */
        $request = \request();
        $c = $request->query('pid');
        $payment = Payment::where('code', $c)->first();
        if ($payment) {
            if($payment->status == 'cancel'){
                return [false,__("Your payment has been canceled")];
            }
            return $payment->markAsCancel();
        }

        return [false];
    }

    public function getValidationRules(){
        return [];
    }

    public function getValidationMessages(){
        return [];
    }
}
