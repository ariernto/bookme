<?php
namespace Modules\Activity;

use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;
use Modules\Activity\Models\Activity;

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

    public static function getBookableServices()
    {
        return [
            'activity' => Activity::class,
        ];
    }

    public static function getAdminMenu()
    {
        $res = [];
        if(Activity::isEnable()){
            $res['activity'] = [
                "position"=>40,
                'url'        => 'admin/module/activity',
                'title'      => __("Activity"),
                'icon'       => 'icon ion-md-umbrella',
                'permission' => 'activity_view',
                'children'   => [
                    'activity_view'=>[
                        'url'        => 'admin/module/activity',
                        'title'      => __('All Activities'),
                        'permission' => 'activity_view',
                    ],
                    'activity_create'=>[
                        'url'        => 'admin/module/activity/create',
                        'title'      => __("Add Activity"),
                        'permission' => 'activity_create',
                    ],
                    'activity_category'=>[
                        'url'        => 'admin/module/activity/category',
                        'title'      => __('Categories'),
                        'permission' => 'activity_manage_others',
                    ],
                    'activity_attribute'=>[
                        'url'        => 'admin/module/activity/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'activity_manage_attributes',
                    ],
                    'activity_availability'=>[
                        'url'        => 'admin/module/activity/availability',
                        'title'      => __('Availability'),
                        'permission' => 'activity_create',
                    ],
                    'activity_booking'=>[
                        'url'        => 'admin/module/activity/booking',
                        'title'      => __('Booking Calendar'),
                        'permission' => 'activity_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/activity/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'activity_view',
                    ],
                ]
            ];
        }
        return $res;
    }


    public static function getUserMenu()
    {
        $res = [];
        if(Activity::isEnable()){
            $res['activity'] = [
                'url'   => route('activity.vendor.index'),
                'title'      => __("Activity"),
                'icon'       => Activity::getServiceIconFeatured(),
                'permission' => 'activity_view',
                'position'   => 21,
                'children'   => [
                    [
                        'url'   => route('activity.vendor.index'),
                        'title' => __("All Activities"),
                    ],
                    [
                        'url'        => route('activity.vendor.create'),
                        'title'      => __("Add Activity"),
                        'permission' => 'activity_create',
                    ],
                    [
                        'url'        => route('activity.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'activity_create',
                    ],
                    [
                        'url'        => route('activity.vendor.booking_report'),
                        'title'      => __("Booking Report"),
                        'permission' => 'activity_view',
                    ],
                    [
                        'url'   => route('activity.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'activity_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getMenuBuilderTypes()
    {
        if(!Activity::isEnable()) return [];

        return [
            [
                'class' => \Modules\Activity\Models\Activity::class,
                'name'  => __("Activity"),
                'items' => \Modules\Activity\Models\Activity::searchForMenu(),
                'position'=>20
            ],
            [
                'class' => \Modules\Activity\Models\ActivityCategory::class,
                'name'  => __("Activity Category"),
                'items' => \Modules\Activity\Models\ActivityCategory::searchForMenu(),
                'position'=>30
            ],
        ];
    }

    public static function getTemplateBlocks(){
        if(!Activity::isEnable()) return [];

        return [
            'list_activities'=>"\\Modules\\Activity\\Blocks\\ListActivities",
            'form_search_activity'=>"\\Modules\\Activity\\Blocks\\FormSearchActivity",
        ];
    }
}
