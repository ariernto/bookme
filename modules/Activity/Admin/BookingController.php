<?php
namespace Modules\Activity\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\ActivityCategory;

class BookingController extends AdminController
{
    protected $activityClass;
    public function __construct()
    {
        $this->setActiveMenu('admin/module/activity');
        parent::__construct();
        $this->activityClass = Activity::class;
    }

    public function index(Request $request){

        $this->checkPermission('activity_create');

        $q = $this->activityClass::query();

        if($request->query('s')){
            $q->where('title','like','%'.$request->query('s').'%');
        }

        if ($cat_id = $request->query('cat_id')) {
            $cat = ActivityCategory::find($cat_id);
            if(!empty($cat)) {
                $q->join('bravo_activity_category', function ($join) use ($cat) {
                    $join->on('bravo_activity_category.id', '=', 'bravo_activities.category_id')
                        ->where('bravo_activity_category._lft','>=',$cat->_lft)
                        ->where('bravo_activity_category._rgt','>=',$cat->_lft);
                });
            }
        }

        if(!$this->hasPermission('activity_manage_others')){
            $q->where('create_user',$this->currentUser()->id);
        }

        $q->orderBy('bravo_activities.id','desc');

        $rows = $q->paginate(10);

        $current_month = strtotime(date('Y-m-01',time()));

        if($request->query('month')){
            $date = date_create_from_format('m-Y',$request->query('month'));
            if(!$date){
                $current_month = time();
            }else{
                $current_month = $date->getTimestamp();
            }
        }

        $prev_url = url('admin/module/activity/booking/').'?'.http_build_query(array_merge($request->query(),[
           'month'=> date('m-Y',$current_month - MONTH_IN_SECONDS)
        ]));
        $next_url = url('admin/module/activity/booking/').'?'.http_build_query(array_merge($request->query(),[
           'month'=> date('m-Y',$current_month + MONTH_IN_SECONDS)
        ]));

        $activity_categories = ActivityCategory::where('status', 'publish')->get()->toTree();
        $breadcrumbs = [
            [
                'name' => __('Activities'),
                'url'  => 'admin/module/activity'
            ],
            [
                'name'  => __('Booking'),
                'class' => 'active'
            ],
        ];
        $page_title = __('Activity Booking History');
        return view('Activity::admin.booking.index',compact('rows','activity_categories','breadcrumbs','current_month','page_title','request','prev_url','next_url'));
    }
    public function test(){
        $d = new \DateTime('2019-07-04 00:00:00');

        $d->modify('+ 4 hours');
        echo $d->format('Y-m-d H:i:s');
    }
}