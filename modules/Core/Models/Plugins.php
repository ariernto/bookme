<?php
namespace Modules\Core\Models;

use App\BaseModel;
use Plugins\ServiceProvider;

class Plugins extends BaseModel
{
    public static function getAllPlugins()
    {
        $plugin_list = [];
        $plugin_modules = ServiceProvider::getModules();
        if (!empty($plugin_modules)) {
            foreach ($plugin_modules as $module) {
                $moduleClass = "\\Plugins\\" . ucfirst($module) . "\\ModuleProvider";
                if (class_exists($moduleClass)) {
                    $pluginItem = call_user_func([$moduleClass, 'getPluginInfo']);
                    if (!empty($pluginItem)) {
                        $pluginItem['module_name'] = $module;
                        $pluginItem['active'] = Plugins::isPluginActive($module);
                        $pluginItem['status'] = Plugins::isPluginActive($module) ? 'active' : 'deactivate';
                        $plugin_list[] = $pluginItem;
                    }
                }
            }
        }
        return $plugin_list;
    }

    public static function isPluginActive($name)
    {
        $listActive = setting_item("core_plugins_active");
        $listActive = $listActive ? json_decode($listActive,true) : [];
        if (in_array($name, $listActive)) {
            return true;
        }
        return false;
    }

    public static function updateActivePlugins($items){
        $listActive = setting_item("core_plugins_active");
        $listActive = $listActive ? json_decode($listActive,true) : [];
        foreach ($items as $item){
            if(!in_array($item,$listActive)){
                $listActive[] = $item;
            }
        }
        setting_update_item('core_plugins_active',json_encode($listActive));
        return true;
    }

    public static function updateDeactivatePlugins($items){
        $listActive = setting_item("core_plugins_active");
        $listActive = $listActive ? json_decode($listActive,true) : [];
        $listActive = array_diff($listActive, $items);
        setting_update_item('core_plugins_active',json_encode($listActive));
        return true;
    }
}
