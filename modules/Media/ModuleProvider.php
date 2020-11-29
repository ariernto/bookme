<?php
namespace Modules\Media;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'media'=>[
                'position'=>50,
                'title'=>__("Media"),
                'icon'=>"fa fa-picture-o",
                "url"=>route('media.admin.index')
            ]
        ];
    }
}
