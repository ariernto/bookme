<?php
namespace  Modules\Booking;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        $keys = [
            'currency_main',
            'currency_format',
            'currency_decimal',
            'currency_thousand',
            'currency_no_decimal',
            'extra_currency'
        ];
        $all = get_payment_gateways();
        $languages = \Modules\Language\Models\Language::getActive();
        if (!empty($all)) {
            foreach ($all as $k => $gateway) {
                if (!class_exists($gateway))
                    continue;
                $obj = new $gateway($k);
                $options = $obj->getOptionsConfigs();
                if (!empty($options)) {
                    foreach ($options as $option) {
                        $keys[] = 'g_' . $k . '_' . $option['id'];
                        if( !empty($option['multi_lang']) && !empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')){
                            foreach($languages as $language){
                                if( setting_item('site_locale') == $language->locale) continue;
                                $keys[] = 'g_' . $k . '_' . $option['id'].'_'.$language->locale;
                            }
                        }
                        if ($option['type'] == 'textarea' && $option['type'] == 'editor') {
                            $htmlKeys[] = 'g_' . $k . '_' . $option['id'];
                        }
                    }
                }
            }
        }

        return [
            [
                'id'   => 'booking',
                'title' => __("Booking Settings"),
                'position'=>40,
                'view'=>"Booking::admin.settings.booking",
                "keys"=>[
                    'booking_enable_recaptcha',
                    'booking_term_conditions',
                    'email_footer',
                    'email_header',

                    'logo_invoice_id',
                    'invoice_company_info',
                    'booking_guest_checkout'
                ],
                'html_keys'=>[

                ]
            ],
            [
                'id'   => 'payment',
                'title' => __("Payment Settings"),
                'position'=>60,
                'view'=>"Booking::admin.settings.payment",
                "keys"=>$keys,
                'html_keys'=>[

                ]
            ],
            [
                'id'   => 'enquiry',
                'title' => __("Enquiry Settings"),
                'position'=>41,
                'view'=>"Booking::admin.settings.enquiry",
                "keys"=>[
                    'booking_enquiry_for_hotel',
                    'booking_enquiry_for_tour',
                    'booking_enquiry_for_space',
                    'booking_enquiry_for_car',
                    'booking_enquiry_for_event',

                    'booking_enquiry_type',

                    'booking_enquiry_enable_mail_to_vendor',
                    'booking_enquiry_mail_to_vendor_content',

                    'booking_enquiry_enable_mail_to_admin',
                    'booking_enquiry_mail_to_admin_content',
                    'booking_enquiry_enable_recaptcha',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
