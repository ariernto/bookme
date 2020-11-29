<?php

namespace  Modules\Event;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'event',
                'title' => __("Event Settings"),
                'position'=>20,
                'view'=>"Event::admin.settings.event",
                "keys"=>[
                    'event_disable',
                    'event_page_search_title',
                    'event_page_search_banner',
                    'event_layout_search',
                    'event_location_search_style',
                    'event_page_limit_item',

                    'event_enable_review',
                    'event_review_approved',
                    'event_enable_review_after_booking',
                    'event_review_number_per_page',
                    'event_review_stats',

                    'event_page_list_seo_title',
                    'event_page_list_seo_desc',
                    'event_page_list_seo_image',
                    'event_page_list_seo_share',

                    'event_booking_buyer_fees',
                    'event_vendor_create_service_must_approved_by_admin',
                    'event_allow_vendor_can_change_their_booking_status',
                    'event_search_fields',
                    'event_map_search_fields',

                    'event_allow_review_after_making_completed_booking',
                    'event_deposit_enable',
                    'event_deposit_type',
                    'event_deposit_amount',
                    'event_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
