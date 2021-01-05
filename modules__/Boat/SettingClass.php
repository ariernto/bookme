<?php

namespace  Modules\Boat;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'boat',
                'title' => __("Boat Settings"),
                'position'=>20,
                'view'=>"Boat::admin.settings.boat",
                "keys"=>[
                    'boat_disable',
                    'boat_page_search_title',
                    'boat_page_search_banner',
                    'boat_layout_search',
                    'boat_location_search_style',
                    'boat_page_limit_item',

                    'boat_enable_review',
                    'boat_review_approved',
                    'boat_enable_review_after_booking',
                    'boat_review_number_per_page',
                    'boat_review_stats',

                    'boat_page_list_seo_title',
                    'boat_page_list_seo_desc',
                    'boat_page_list_seo_image',
                    'boat_page_list_seo_share',

                    'boat_booking_buyer_fees',
                    'boat_vendor_create_service_must_approved_by_admin',
                    'boat_allow_vendor_can_change_their_booking_status',
                    'boat_search_fields',
                    'boat_map_search_fields',

                    'boat_allow_review_after_making_completed_booking',
                    'boat_deposit_enable',
                    'boat_deposit_type',
                    'boat_deposit_amount',
                    'boat_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
