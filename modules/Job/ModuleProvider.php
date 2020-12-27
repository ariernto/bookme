<?php
namespace Modules\Job;
use Modules\ModuleServiceProvider;
use Modules\Job\Models\Job;

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
        if(!Job::isEnable()) return [];
        return [
            'hotel'=>[
                "position"=>32,
                'url'        => 'admin/module/job',
                'title'      => __('Jobs'),
                'icon'       => 'fa fa-building-o',
                'permission' => 'job_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/job',
                        'title'      => __('All Jobs'),
                        'permission' => 'job_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/job/create',
                        'title'      => __('Add new Job'),
                        'permission' => 'job_create',
                    ],
                    'category'=>[
                        'url'        => 'admin/module/job/room/attribute',
                        'title'      => __('Categories'),
                        'permission' => 'job_manage_attributes',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/job/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'job_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Job::isEnable()) return [];
        return [
            'hotel'=>Job::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Job::isEnable()) return [];
        return [
            'hotel'=>[
                'class' => Job::class,
                'name'  => __("Job"),
                'items' => Job::searchForMenu(),
                'position'=>41
            ]
        ];
    }


    public static function getUserMenu()
    {
        $res = [];
        if(Job::isEnable()){
            $res['hotel'] = [
                'url'   => route('job.vendor.index'),
                'title'      => __("Manage Job"),
                'icon'       => Job::getServiceIconFeatured(),
                'position'   => 30,
                'permission' => 'job_view',
                'children' => [
                    [
                        'url'   => route('job.vendor.index'),
                        'title'  => __("All Hotels"),
                    ],
                    [
                        'url'   => route('job.vendor.create'),
                        'title'      => __("Add Job"),
                        'permission' => 'job_create',
                    ],
                    [
                        'url'   => route('job.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'job_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Job::isEnable()) return [];
        return [
            'form_search_hotel'=>"\\Modules\\Job\\Blocks\\FormSearchJob",
            'list_hotel'=>"\\Modules\\Job\\Blocks\\ListJob",
        ];
    }
}
