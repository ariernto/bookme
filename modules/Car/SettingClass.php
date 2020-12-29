<?php

namespace  Modules\Car;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'car',
                'title' => __("Car Settings"),
                'position'=>20,
                'view'=>"Car::admin.settings.car",
                "keys"=>[
                    'car_disable',
                    'car_page_search_title',
                    'car_page_search_banner',
                    'car_layout_search',
                    'car_location_search_style',
                    'car_page_limit_item',

                    'car_enable_review',
                    'car_review_approved',
                    'car_enable_review_after_booking',
                    'car_review_number_per_page',
                    'car_review_stats',

                    'car_page_list_seo_title',
                    'car_page_list_seo_desc',
                    'car_page_list_seo_image',
                    'car_page_list_seo_share',

                    'car_booking_buyer_fees',
                    'car_vendor_create_service_must_approved_by_admin',
                    'car_allow_vendor_can_change_their_booking_status',
                    'car_search_fields',
                    'car_map_search_fields',

                    'car_allow_review_after_making_completed_booking',
                    'car_deposit_enable',
                    'car_deposit_type',
                    'car_deposit_amount',
                    'car_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
