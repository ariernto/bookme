<?php
namespace Modules\Boat;
use Modules\Boat\Models\Boat;
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
        if(!Boat::isEnable()) return [];
        return [
            'boat'=>[
                "position"=>45,
                'url'        => 'admin/module/boat',
                'title'      => __('Boat'),
                'icon'       => 'ion-md-boat',
                'permission' => 'boat_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/boat',
                        'title'      => __('All Boats'),
                        'permission' => 'boat_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/boat/create',
                        'title'      => __('Add new Boat'),
                        'permission' => 'boat_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/boat/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'boat_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => 'admin/module/boat/availability',
                        'title'      => __('Availability'),
                        'permission' => 'boat_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/boat/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'boat_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Boat::isEnable()) return [];
        return [
            'boat'=>Boat::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Boat::isEnable()) return [];
        return [
            'boat'=>[
                'class' => Boat::class,
                'name'  => __("Boat"),
                'items' => Boat::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if(Boat::isEnable()){
            $res['boat'] = [
                'url'   => route('boat.vendor.index'),
                'title'      => __("Manage Boat"),
                'icon'       => Boat::getServiceIconFeatured(),
                'position'   => 33,
                'permission' => 'boat_view',
                'children' => [
                    [
                        'url'   => route('boat.vendor.index'),
                        'title'  => __("All Boats"),
                    ],
                    [
                        'url'   => route('boat.vendor.create'),
                        'title'      => __("Add Boat"),
                        'permission' => 'boat_create',
                    ],
                    [
                        'url'        => route('boat.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'boat_create',
                    ],
                    [
                        'url'   => route('boat.vendor.booking_report'),
                        'title'      => __("Booking Report"),
                        'permission' => 'boat_view',
                    ],
                    [
                        'url'   => route('boat.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'boat_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Boat::isEnable()) return [];
        return [
            'form_search_boat'=>"\\Modules\\Boat\\Blocks\\FormSearchBoat",
            'list_boat'=>"\\Modules\\Boat\\Blocks\\ListBoat",
            'boat_term_featured_box'=>"\\Modules\\Boat\\Blocks\\BoatTermFeaturedBox",
        ];
    }
}
