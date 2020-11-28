<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/2/2019
 * Time: 9:37 AM
 */
namespace Modules\Core\Abstracts;

use Illuminate\Http\Request;

abstract class BaseSettingsClass{
    abstract public static function getSettingPages();

    public static function filterValuesBeforeSaving($setting_values,Request $request)
    {
        return $setting_values;
    }
}