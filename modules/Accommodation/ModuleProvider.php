<?php
namespace Modules\Accommodation;
use Modules\ModuleServiceProvider;
use Modules\Accommodation\Models\Accommodation;

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
        if(!Accommodation::isEnable()) return [];
        return [
            'accommodation'=>[
                "position"=>14,
                'url'        => 'admin/module/accommodation',
                'title'      => __('Accommodation'),
                'icon'       => 'ion ion-md-home',
                'permission' => 'accommodation_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/accommodation',
                        'title'      => __('All Accommodations'),
                        'permission' => 'accommodation_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/accommodation/create',
                        'title'      => __('Add new Accommodation'),
                        'permission' => 'accommodation_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/accommodation/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'accommodation_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => 'admin/module/accommodation/availability',
                        'title'      => __('Availability'),
                        'permission' => 'accommodation_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/accommodation/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'accommodation_view',
                    ],

                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        return [
            'accommodation'=>Accommodation::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Accommodation::isEnable()) return [];
        return [
            'accommodation'=>[
                'class' => Accommodation::class,
                'name'  => __("Accommodations"),
                'items' => Accommodation::searchForMenu(),
                'position'=>41
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if (Accommodation::isEnable()) {
            $res['accommodation'] = [
                'url'        => route('accommodation.vendor.index'),
                'title'      => __("Accommodation"),
                'icon'       => Accommodation::getServiceIconFeatured(),
                'position'   => 26,
                'permission' => 'accommodation_view',
                'children'   => [
                    [
                        'url'   => route('accommodation.vendor.index'),
                        'title' => __("All Accommodations"),
                    ],
                    [
                        'url'        => route('accommodation.vendor.create'),
                        'title'      => __("Add Accommodation"),
                        'permission' => 'accommodation_create',
                    ],
                    [
                        'url'        => route('accommodation.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'accommodation_create',
                    ],
                    [
                        'url'        => route('accommodation.vendor.booking_report'),
                        'title'      => __("Booking Report"),
                        'permission' => 'accommodation_view',
                    ],
                    [
                        'url'   => route('accommodation.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'accommodation_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Accommodation::isEnable()) return [];
        return [
            'form_search_accommodation'=>"\\Modules\\Accommodation\\Blocks\\FormSearchAccommodation",
            'list_accommodation'=>"\\Modules\\Accommodation\\Blocks\\ListAccommodation",
            'accommodation_term_featured_box'=>"\\Modules\\Accommodation\\Blocks\\AccommodationTermFeaturedBox",
        ];
    }
}
