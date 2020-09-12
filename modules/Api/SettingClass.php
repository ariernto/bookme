<?php

namespace  Modules\Api;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'api',
                'title' => __("Mobile App Settings"),
                'position'=>130,
                'view'=>"Api::admin.settings.api",
                "keys"=>[
                    'api_app_layout',
                ],
            ]
        ];
    }
}
