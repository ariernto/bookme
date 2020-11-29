<?php
namespace Modules\Vendor;

use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;
use Modules\Vendor\Models\VendorPayout;

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
        $count = VendorPayout::countInitial();
        return [
            'payout'=>[
                "position"=>60,
                'url'        => 'admin/module/vendor/payout',
                'title'      => __("Payouts :count",['count'=>$count ? sprintf('<span class="badge badge-warning">%d</span>',$count) : '']),
                'icon'       => 'icon ion-md-card',
                'permission' => 'user_create',
            ]
        ];
    }


    public static function getTemplateBlocks(){
        return [
            'vendor_register_form'=>"\\Modules\\Vendor\\Blocks\\VendorRegisterForm",
        ];
    }
    public static function getUserMenu()
    {
        $res = [];
        if(!setting_item('disable_payout'))
        {
            $res['payout']= [
                'url'        => route('vendor.payout.index'),
                'title'      => __("Payouts"),
                'icon'       => 'icon ion-md-card',
                'position'   => 38,
                'permission' => 'dashboard_vendor_access',
            ];
        }

        return $res;
    }
}
