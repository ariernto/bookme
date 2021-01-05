<?php

namespace  Modules\Sauna;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'sauna',
                'title' => __("Sauna Settings"),
                'position'=>20,
                'view'=>"Sauna::admin.settings.sauna",
                "keys"=>[
                    'sauna_disable',
                    'sauna_page_search_title',
                    'sauna_page_search_banner',
                    'sauna_layout_search',
                    'sauna_location_search_style',
                    'sauna_page_limit_item',

                    'sauna_enable_review',
                    'sauna_review_approved',
                    'sauna_enable_review_after_booking',
                    'sauna_review_number_per_page',
                    'sauna_review_stats',

                    'sauna_page_list_seo_title',
                    'sauna_page_list_seo_desc',
                    'sauna_page_list_seo_image',
                    'sauna_page_list_seo_share',

                    'sauna_booking_buyer_fees',
                    'sauna_vendor_create_service_must_approved_by_admin',
                    'sauna_allow_vendor_can_change_their_booking_status',
                    'sauna_search_fields',
                    'sauna_map_search_fields',

                    'sauna_allow_review_after_making_completed_booking',
                    'sauna_deposit_enable',
                    'sauna_deposit_type',
                    'sauna_deposit_amount',
                    'sauna_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
