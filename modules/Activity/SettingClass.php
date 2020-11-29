<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/2/2019
 * Time: 10:26 AM
 */
namespace  Modules\Activity;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'activity',
                'title' => __("Activity Settings"),
                'position'=>20,
                'view'=>"Activity::admin.settings.activity",
                "keys"=>[
                    'activity_disable',
                    'activity_page_search_title',
                    'activity_page_search_banner',
                    'activity_layout_search',
                    'activity_location_search_style',
                    'activity_page_limit_item',

                    'activity_enable_review',
                    'activity_review_approved',
                    'activity_enable_review_after_booking',
                    'activity_review_number_per_page',
                    'activity_review_stats',
                    'activity_page_list_seo_title',
                    'activity_page_list_seo_desc',
                    'activity_page_list_seo_image',
                    'activity_page_list_seo_share',
                    'activity_booking_buyer_fees',
                    'activity_vendor_create_service_must_approved_by_admin',
                    'activity_allow_vendor_can_change_their_booking_status',
                    'activity_search_fields',
                    'activity_map_search_fields',

                    'activity_allow_review_after_making_completed_booking',
                    'activity_deposit_enable',
                    'activity_deposit_type',
                    'activity_deposit_amount',
                    'activity_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
