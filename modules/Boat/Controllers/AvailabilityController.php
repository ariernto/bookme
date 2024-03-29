<?php
namespace Modules\Boat\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Modules\Boat\Models\Boat;
use Modules\Boat\Models\BoatDate;
use Modules\FrontendController;

class AvailabilityController extends FrontendController{

    protected $boatClass;
    /**
     * @var BoatDate
     */
    protected $boatDateClass;

    /**
     * @var Booking
     */
    protected $bookingClass;

    protected $indexView = 'Boat::frontend.user.availability';

    public function __construct()
    {
        parent::__construct();
        $this->boatClass = Boat::class;
        $this->boatDateClass = BoatDate::class;
        $this->bookingClass = Booking::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Boat::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
    public function index(Request $request){
        $this->checkPermission('boat_create');

        $q = $this->boatClass::query();

        if($request->query('s')){
            $q->where('title','like','%'.$request->query('s').'%');
        }

        if(!$this->hasPermission('boat_manage_others')){
            $q->where('create_user',$this->currentUser()->id);
        }

        $q->orderBy('bravo_boats.id','desc');

        $rows = $q->paginate(15);

        $current_month = strtotime(date('Y-m-01',time()));

        if($request->query('month')){
            $date = date_create_from_format('m-Y',$request->query('month'));
            if(!$date){
                $current_month = time();
            }else{
                $current_month = $date->getTimestamp();
            }
        }
        $breadcrumbs = [
            [
                'name' => __('Boats'),
                'url'  => route('boat.vendor.index')
            ],
            [
                'name'  => __('Availability'),
                'class' => 'active'
            ],
        ];
        $page_title = __('Boats Availability');

        return view($this->indexView,compact('rows','breadcrumbs','current_month','page_title','request'));
    }

    public function loadDates(Request $request){

        $rules = [
            'id'=>'required',
            'start'=>'required',
            'end'=>'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $is_single = $request->query('for_single');
        $boat = $this->boatClass::find($request->query('id'));
        if(empty($boat)){
            return $this->sendError(__('Boat not found'));
        }

        $query = $this->boatDateClass::query();
        $query->where('target_id',$request->query('id'));
        $query->where('start_date','>=',date('Y-m-d H:i:s',strtotime($request->query('start'))));
        $query->where('end_date','<=',date('Y-m-d H:i:s',strtotime($request->query('end'))));

        $rows =  $query->take(40)->get();
        $allDates = [];

        $period = periodDate($request->query('start'),$request->query('end'));
        foreach ($period as $dt){
                $i = $dt->getTimestamp();
            $date = [
                'id'=>rand(0,999),
                'active'=>0,
                'price'=>(!empty($boat->sale_price) and $boat->sale_price > 0 and $boat->sale_price < $boat->price) ? $boat->sale_price : $boat->price,
                'is_instant'=>$boat->is_instant,
                'is_default'=>true,
                'textColor'=>'#2791fe'
            ];
            $date['price_html'] = format_money($date['price']).' x '.$boat->number;
            if(!$is_single) {
                $date['price_html'] = format_money_main($date['price']).' x '.$boat->number;
            }
            $date['title'] = $date['event']  = $date['price_html'];
            $date['start'] = $date['end'] = date('Y-m-d',$i);
            $date['number'] = $boat->number;

            if($boat->default_state){
                $date['active'] = 1;
            }else{
                $date['title'] = $date['event'] = __('Blocked');
                $date['backgroundColor'] = 'orange';
                $date['borderColor'] = '#fe2727';
                $date['classNames'] = ['blocked-event'];
                $date['textColor'] = '#fe2727';
            }
            $allDates[date('Y-m-d',$i)] = $date;
        }
        if(!empty($rows))
        {
            foreach ($rows as $row)
            {
                $row->start = date('Y-m-d',strtotime($row->start_date));
                $row->end = date('Y-m-d',strtotime($row->start_date));
                $row->textColor = '#2791fe';
                $price = $row->price;
                if(empty($price)){
                    $price = (!empty($boat->sale_price) and $boat->sale_price > 0 and $boat->sale_price < $boat->price) ? $boat->sale_price : $boat->price;
                }
                $row->title = $row->event = format_money($price).' x '.$row->number;
                if(!$is_single) {
                    $row->title = $row->event = format_money_main($price).' x '.$row->number;
                }
                $row->price = $price;

                if(!$row->active)
                {
                    $row->title = $row->event = __('Blocked');
                    $row->backgroundColor = '#fe2727';
                    $row->classNames = ['blocked-event'];
                    $row->textColor = '#fe2727';
                    $row->active = 0;
                }else{
                    $row->classNames = ['active-event'];
                    $row->active = 1;
                    if($row->is_instant){
                        $row->title = '<i class="fa fa-bolt"></i> '.$row->title;
                    }
                }

                $allDates[date('Y-m-d',strtotime($row->start_date))] = $row->toArray();

            }
        }

        $model_boat = new $this->boatClass;
        $bookings = $model_boat->getBookingInRanges($boat->id,$boat->type,$request->query('start'),$request->query('end'));
        if(!empty($bookings))
        {
            foreach ($bookings as $booking){
                $period = periodDate($booking->start_date,$booking->end_date);
                foreach ($period as $dt){
                    $i = $dt->getTimestamp();
                    if(isset($allDates[date('Y-m-d',$i)])){
                        $total_number_booking = $booking->total_numbers;
                        $max_number = $allDates[date('Y-m-d',$i)]['number'];
                        if($total_number_booking >= $max_number){
                            $allDates[date('Y-m-d',$i)]['active'] = 0;
                            $allDates[date('Y-m-d',$i)]['event'] = __('Full Book');
                            $allDates[date('Y-m-d',$i)]['title'] = __('Full Book');
                            $allDates[date('Y-m-d',$i)]['classNames'] = ['full-book-event'];
                        }
                    }
                }
            }
        }

        $data = array_values($allDates);

        return response()->json($data);
    }

    public function store(Request $request){

        $request->validate([
            'target_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $boat = $this->boatClass::find($request->input('target_id'));
        $target_id = $request->input('target_id');

        if(empty($boat)){
            return $this->sendError(__('Boat not found'));
        }

        if(!$this->hasPermission('boat_manage_others')){
            if($boat->create_user != Auth::id()){
                return $this->sendError("You do not have permission to access it");
            }
        }

        $postData = $request->input();
        $period = periodDate($request->input('start_date'),$request->input('end_date'));
        foreach ($period as $dt){
            $date = $this->boatDateClass::where('start_date',$dt->format('Y-m-d'))->where('target_id',$target_id)->first();

            if(empty($date)){
                $date = new $this->boatDateClass();
                $date->target_id = $target_id;
            }
            $postData['start_date'] = $dt->format('Y-m-d H:i:s');
            $postData['end_date'] = $dt->format('Y-m-d H:i:s');


            $date->fillByAttr([
                'start_date','end_date','price','number',
                'is_instant','active',
            ],$postData);

            $date->save();
        }

        $this->sendSuccess([],__("Update Success"));

    }
}
