<?php


namespace Modules\Report;

use Modules\User\Models\Wallet\DepositPayment;

class ModuleProvider extends \Modules\ModuleServiceProvider
{
    public function register()
    {

        $this->app->register(RouteServiceProvider::class);
    }
    public static function getAdminMenu()
    {
        $count = 0;
        $pending_purchase = DepositPayment::countPending();
        $count += $pending_purchase;
        return [
            'report'=>[
                "position"=>110,
                'url'        => 'admin/module/report/booking',
                'title'      =>  __('Reports :count',['count'=>$count ? sprintf('<span class="badge badge-warning">%d</span>',$count) : '']),
                'icon'       => 'icon ion-ios-pie',
                'permission' => 'report_view',
                'children'   => [
                    'enquiry'=>[
                        'url'        => 'admin/module/report/enquiry',
                        'title'      => __('Enquiry Reports'),
                        'icon'       => 'icon ion-ios-pricetags',
                        'permission' => 'report_view',
                    ],
                    'booking'=>[
                        'url'        => 'admin/module/report/booking',
                        'title'      => __('Booking Reports'),
                        'icon'       => 'icon ion-ios-pricetags',
                        'permission' => 'report_view',
                    ],
                    'statistic'=>[
                        'url'        => 'admin/module/report/statistic',
                        'title'      => __('Booking Statistic'),
                        'icon'       => 'icon ion ion-md-podium',
                        'permission' => 'report_view',
                    ],
                    'contact'=>[
                        'url'        => 'admin/module/contact',
                        'title'      => __('Contact Submissions'),
                        'icon'       => 'icon ion ion-md-mail',
                        'permission' => 'contact_manage',
                    ],
                    'buy_credit_report'=>[
                        'parent'=>'report',
                        'url'=>route('user.admin.wallet.report'),
                        'title'=>__("Credit Purchase Report :count",['count'=>$pending_purchase ? sprintf('<span class="badge badge-warning">%d</span>',$pending_purchase) : '']),
                        'icon'=>'fa fa-money'
                    ]
                ]
            ],
        ];
    }
}
