<?php
namespace Modules\Hotel;
use Modules\ModuleServiceProvider;
use Modules\Hotel\Models\Hotel;

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
        if(!Hotel::isEnable()) return [];
        return [
            'hotel'=>[
                "position"=>32,
                'url'        => 'admin/module/hotel',
                'title'      => __('Hotel'),
                'icon'       => 'fa fa-building-o',
                'permission' => 'hotel_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/hotel',
                        'title'      => __('All Hotels'),
                        'permission' => 'hotel_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/hotel/create',
                        'title'      => __('Add new Hotel'),
                        'permission' => 'hotel_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/hotel/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'hotel_manage_attributes',
                    ],
                    'room_attribute'=>[
                        'url'        => 'admin/module/hotel/room/attribute',
                        'title'      => __('Room Attributes'),
                        'permission' => 'hotel_manage_attributes',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/hotel/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'hotel_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Hotel::isEnable()) return [];
        return [
            'hotel'=>Hotel::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Hotel::isEnable()) return [];
        return [
            'hotel'=>[
                'class' => Hotel::class,
                'name'  => __("Hotel"),
                'items' => Hotel::searchForMenu(),
                'position'=>41
            ]
        ];
    }


    public static function getUserMenu()
    {
        $res = [];
        if(Hotel::isEnable()){
            $res['hotel'] = [
                'url'   => route('hotel.vendor.index'),
                'title'      => __("Manage Hotel"),
                'icon'       => Hotel::getServiceIconFeatured(),
                'position'   => 30,
                'permission' => 'hotel_view',
                'children' => [
                    [
                        'url'   => route('hotel.vendor.index'),
                        'title'  => __("All Hotels"),
                    ],
                    [
                        'url'   => route('hotel.vendor.create'),
                        'title'      => __("Add Hotel"),
                        'permission' => 'hotel_create',
                    ],
                    [
                        'url'   => route('hotel.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'hotel_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Hotel::isEnable()) return [];
        return [
            'form_search_hotel'=>"\\Modules\\Hotel\\Blocks\\FormSearchHotel",
            'list_hotel'=>"\\Modules\\Hotel\\Blocks\\ListHotel",
        ];
    }
}
