<?php
namespace Modules\Car;
use Modules\Car\Models\Car;
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
        if(!Car::isEnable()) return [];
        return [
            'car'=>[
                "position"=>45,
                'url'        => 'admin/module/car',
                'title'      => __('Car'),
                'icon'       => 'ion-logo-model-s',
                'permission' => 'car_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/car',
                        'title'      => __('All Cars'),
                        'permission' => 'car_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/car/create',
                        'title'      => __('Add new Car'),
                        'permission' => 'car_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/car/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'car_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => 'admin/module/car/availability',
                        'title'      => __('Availability'),
                        'permission' => 'car_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/car/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'car_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Car::isEnable()) return [];
        return [
            'car'=>Car::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Car::isEnable()) return [];
        return [
            'car'=>[
                'class' => Car::class,
                'name'  => __("Car"),
                'items' => Car::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if(Car::isEnable()){
            $res['car'] = [
                'url'   => route('car.vendor.index'),
                'title'      => __("Manage Car"),
                'icon'       => Car::getServiceIconFeatured(),
                'position'   => 33,
                'permission' => 'car_view',
                'children' => [
                    [
                        'url'   => route('car.vendor.index'),
                        'title'  => __("All Cars"),
                    ],
                    [
                        'url'   => route('car.vendor.create'),
                        'title'      => __("Add Car"),
                        'permission' => 'car_create',
                    ],
                    [
                        'url'        => route('car.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'car_create',
                    ],
                    [
                        'url'   => route('car.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'car_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Car::isEnable()) return [];
        return [
            'form_search_car'=>"\\Modules\\Car\\Blocks\\FormSearchCar",
            'list_car'=>"\\Modules\\Car\\Blocks\\ListCar",
            'car_term_featured_box'=>"\\Modules\\Car\\Blocks\\CarTermFeaturedBox",
        ];
    }
}
