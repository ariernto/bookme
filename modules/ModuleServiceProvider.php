<?php
namespace Modules;
class ModuleServiceProvider extends \Illuminate\Support\ServiceProvider
{


    public static function getAdminMenu(){
        return [];
    }

    public static function getAdminSubmenu(){
        return [];
    }
    public static function getBookableServices(){
        return [];
    }

    public static function getMenuBuilderTypes(){
        return [];
    }

    public static function adminUserMenu(){
        return [];
    }

    public static function adminUserSubMenu(){
        return [];
    }

    public static function getUserMenu(){
        return [];
    }

    public static function getUserSubMenu(){
        return [];
    }

    public static function getTemplateBlocks(){
        return [];
    }
    public static function getPaymentGateway(){
        return [];
    }

    public static function getActionsHook(){
        return [];
    }
    public static function getFiltersHook(){
        return [];
    }

    function register()
    {
        $actions = static::getActionsHook();
        if(!empty($actions)){
            foreach ($actions as $args){
                call_user_func_array('add_action',$args);
            }
        }
        $filters = static::getFiltersHook();
        if(!empty($filters)){
            foreach ($filters as $args){
                call_user_func_array('add_filter',$args);
            }
        }
    }
}
