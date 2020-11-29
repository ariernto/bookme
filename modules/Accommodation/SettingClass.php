<?php

namespace  Modules\Accommodation;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'accommodation',
                'title' => __("Accommodation Settings"),
                'position'=>20,
                'view'=>"Accommodation::admin.settings.accommodation",
                "keys"=>[
                    'accommodation_disable',
                    'accommodation_page_search_title',
                    'accommodation_page_search_banner',
                    'accommodation_layout_search',
                    'accommodation_location_search_style',
                    'accommodation_page_limit_item',

                    'accommodation_enable_review',
                    'accommodation_review_approved',
                    'accommodation_enable_review_after_booking',
                    'accommodation_review_number_per_page',
                    'accommodation_review_stats',

                    'accommodation_page_list_seo_title',
                    'accommodation_page_list_seo_desc',
                    'accommodation_page_list_seo_image',
                    'accommodation_page_list_seo_share',

                    'accommodation_booking_buyer_fees',
                    'accommodation_vendor_create_service_must_approved_by_admin',
                    'accommodation_allow_vendor_can_change_their_booking_status',
                    'accommodation_search_fields',
                    'accommodation_map_search_fields',

                    'accommodation_allow_review_after_making_completed_booking',
                    'accommodation_deposit_enable',
                    'accommodation_deposit_type',
                    'accommodation_deposit_amount',
                    'accommodation_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
