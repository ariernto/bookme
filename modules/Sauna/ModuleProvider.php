<?php
namespace Modules\Sauna;
use Modules\Sauna\Models\Sauna;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

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
        if(!Sauna::isEnable()) return [];
        return [
            'sauna'=>[
                "position"=>50,
                'url'        => route('sauna.admin.index'),
                'title'      => __('Sauna'),
                'icon'       => 'ion-ios-calendar',
                'permission' => 'sauna_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('sauna.admin.index'),
                        'title'      => __('All Saunas'),
                        'permission' => 'sauna_view',
                    ],
                    'create'=>[
                        'url'        => route('sauna.admin.create'),
                        'title'      => __('Add new Sauna'),
                        'permission' => 'sauna_create',
                    ],
                    'attribute'=>[
                        'url'        => route('sauna.admin.attribute.index'),
                        'title'      => __('Attributes'),
                        'permission' => 'sauna_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => 'admin/module/sauna/availability',
                        'title'      => __('Availability'),
                        'permission' => 'sauna_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/sauna/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'sauna_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Sauna::isEnable()) return [];
        return [
            'sauna'=>Sauna::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Sauna::isEnable()) return [];
        return [
            'sauna'=>[
                'class' => Sauna::class,
                'name'  => __("Sauna"),
                'items' => Sauna::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getUserMenu()
    {
        if(!Sauna::isEnable()) return [];
        return [
            'sauna' => [
                'url'   => route('sauna.vendor.index'),
                'title'      => __("Manage Sauna"),
                'icon'       => Sauna::getServiceIconFeatured(),
                'position'   => 34,
                'permission' => 'sauna_view',
                'children' => [
                    [
                        'url'   => route('sauna.vendor.index'),
                        'title'  => __("All Saunas"),
                    ],
                    [
                        'url'   => route('sauna.vendor.create'),
                        'title'      => __("Add Sauna"),
                        'permission' => 'sauna_create',
                    ],
                    'availability'=>[
                        'url'        => route('sauna.vendor.availability.index'),
                        'title'      => __('Availability'),
                        'permission' => 'sauna_create',
                    ],
                    [
                        'url'   => route('sauna.vendor.booking_report'),
                        'title'      => __("Booking Report"),
                        'permission' => 'sauna_view',
                    ],
                    [
                        'url'   => route('sauna.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'sauna_create',
                    ],
                ]
            ],
        ];
    }

    public static function getTemplateBlocks(){
        if(!Sauna::isEnable()) return [];
        return [
            'form_search_sauna'=>"\\Modules\\Sauna\\Blocks\\FormSearchSauna",
            'list_sauna'=>"\\Modules\\Sauna\\Blocks\\ListSauna",
            'sauna_term_featured_box'=>"\\Modules\\Sauna\\Blocks\\SaunaTermFeaturedBox",
        ];
    }
}
