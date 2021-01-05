<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 7/3/2019
 * Time: 9:27 PM
 */
namespace Modules\Page;

use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;
use Modules\Page\Providers\RouterServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('page.php'),
        ]);

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'page'
        );

        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'page'=>[
                "position"=>20,
                'url'   => 'admin/module/page',
                'title' => __("Page"),
                'icon'  => 'icon ion-ios-bookmarks',
                'permission'=>'page_view'
            ],
        ];
    }
}