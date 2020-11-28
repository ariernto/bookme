<?php
namespace Plugins;

use File;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if (file_exists(__DIR__ . '/' . $module . '/Config/config.php')) {
                $this->publishes([
                    __DIR__ . '/' . $module . '/Config/config.php' => config_path(strtolower($module) . '.php'),
                ]);
            }
        }
    }

    public function register()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if (file_exists(__DIR__ . '/' . $module . '/Config/config.php')) {
                $this->mergeConfigFrom(__DIR__ . '/' . $module . '/Config/config.php', strtolower($module));
            }
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
            $class = "\Plugins\\" . ucfirst($module) . "\\ModuleProvider";
            if (class_exists($class)) {
                $this->app->register($class);
            }
        }
        if (is_dir(__DIR__ . '/Layout')) {
            $this->loadViewsFrom(__DIR__ . '/Layout', 'Layout');
        }
    }

    public static function getModules()
    {
        return array_map('basename', array_filter(glob(base_path() . '/plugins/*'), 'is_dir'));
    }
}