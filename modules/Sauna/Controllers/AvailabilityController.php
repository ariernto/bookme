<?php
namespace Modules\Sauna\Controllers;

use ICal\ICal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Modules\Sauna\Models\Sauna;
use Modules\Sauna\Models\SaunaDate;
use Modules\FrontendController;

class AvailabilityController extends FrontendController{

    protected $saunaClass;
    /**
     * @var SaunaDate
     */
    protected $saunaDateClass;

    /**
     * @var Booking
     */
    protected $bookingClass;

    protected $indexView = 'Sauna::frontend.user.availability';

    public function __construct()
    {
        parent::__construct();
        $this->saunaClass = Sauna::class;
        $this->saunaDateClass = SaunaDate::class;
        $this->bookingClass = Booking::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Sauna::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
    public function index(Request $request){
        $this->checkPermission('sauna_create');

        $q = $this->saunaClass::query();

        if($request->query('s')){
            $q->where('title','like','%'.$request->query('s').'%');
        }

        if(!$this->hasPermission('sauna_manage_others')){
            $q->where('create_user',$this->currentUser()->id);
        }

        $q->orderBy('bravo_saunas.id','desc');

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
                'name' => __('Saunas'),
                'url'  => route('sauna.vendor.index')
            ],
            [
                'name'  => __('Availability'),
                'class' => 'active'
            ],
        ];
        $page_title = __('Saunas Availability');

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

        $sauna = $this->saunaClass::find($request->query('id'));
        if(empty($sauna)){
            return $this->sendError(__('Sauna not found'));
        }
        $is_single = $request->query('for_single');

        $query = $this->saunaDateClass::query();
        $query->where('target_id',$request->query('id'));
        $query->where('start_date','>=',date('Y-m-d H:i:s',strtotime($request->query('start'))));
        $query->where('end_date','<=',date('Y-m-d H:i:s',strtotime($request->query('end'))));
        $rows =  $query->take(50)->get();
        $allDates = [];

        $period = periodDate($request->input('start'),$request->input('end'));
        foreach ($period as $dt){
            $date = [
                'id'=>rand(0,999),
                'active'=>0,
                'textColor'=>'#2791fe'
            ];
            $date['start'] = $date['end'] = $dt->format('Y-m-d');
            if($sauna->default_state){
                $date['active'] = 1;
            }else{
                $date['title'] = $date['sauna'] = __('Blocked');
                $date['backgroundColor'] = 'orange';
                $date['borderColor'] = '#fe2727';
                $date['classNames'] = ['blocked-sauna'];
                $date['textColor'] = '#fe2727';
            }
            if ($sauna->ticket_types) {
                $date['ticket_types'] = $sauna->ticket_types;
                $c_title = "";
                foreach (  $date['ticket_types']  as &$ticket){
                    if(!$is_single){
                        $c_title .= $ticket['name'].": ".format_money_main($ticket['price'])."<br>";
                        //for single
                        $ticket['display_price'] = format_money_main($ticket['price']);
                    }else{
                        $c_title .= $ticket['name'].": ".format_money($ticket['price'])."<br>";
                        //for single
                        $ticket['display_price'] = format_money($ticket['price']);
                    }
                    $ticket['min'] = 0;
                    $ticket['max'] = $ticket['number'];
                    if($is_single){
                        $ticket['number'] = 0;
                    }
                }
                $date['ticket_types'] = array_values($date['ticket_types']);
                $date['title'] = $date['sauna']  = $c_title;
            }
            $allDates[$dt->format('Y-m-d')] = $date;
        }

       // dd($rows);

        if(!empty($rows))
        {
            foreach ($rows as $row)
            {
                $ticketData = $allDates[date('Y-m-d',strtotime($row->start_date))];
                $list_ticket_types = null;
                if ($row->ticket_types) {
                    $list_ticket_types = $row->ticket_types;
                    $c_title = "";
                    foreach ( $list_ticket_types as $k=>&$ticket){
                        if(!$is_single){
                            $c_title .= $ticket['name'].": ".format_money_main($ticket['price'])."<br>";
                            //for single
                            $ticket['display_price'] = format_money_main($ticket['price']);
                        }else{
                            $c_title .= $ticket['name'].": ".format_money($ticket['price'])."<br>";
                            //for single
                            $ticket['display_price'] = format_money($ticket['price']);
                        }
                        $ticket['min'] = 0;
                        $ticket['max'] = $ticket['number'];
                        if($is_single){
                            $ticket['number'] = 0;
                        }
                    }
                    $ticketData['title'] = $ticketData['sauna']  = $c_title;
                }
                $ticketData['ticket_types'] = $list_ticket_types;
                if(!$row->active)
                {
                    $ticketData['title'] = $row->sauna = __('Blocked');
                    $ticketData['backgroundColor'] = '#fe2727';
                    $ticketData['classNames'] = ['blocked-sauna'];
                    $ticketData['textColor'] = '#fe2727';
                    $ticketData['active'] = 0;
                }else{
                    $ticketData['classNames'] = ['active-sauna'];
                    $ticketData['active'] = 1;
                }
                $allDates[date('Y-m-d',strtotime($row->start_date))] = $ticketData;
            }
        }

        $bookings = $this->bookingClass::getAllBookingInRanges($sauna->id,$sauna->type,$request->query('start'),$request->query('end'));
        if(!empty($bookings))
        {
            foreach ($bookings as $booking){
                $period = periodDate($booking->start_date,$booking->end_date);
                foreach ($period as $dt){
                    $date = $dt->format('Y-m-d');
                    if(isset($allDates[$date])){
                        $isBook = false;
                        $list_ticket_types = $allDates[$dt->format('Y-m-d')]['ticket_types'];
                        $bookingTicketTypes = $booking->getJsonMeta('ticket_types') ?? [];
                        foreach ($bookingTicketTypes as $bookingTicket){
                            $numberBoook = $bookingTicket['number'];
                            foreach ($list_ticket_types as &$ticket){
                                if( $ticket['code'] == $bookingTicket['code']){
                                    $ticket['max'] =  $ticket['max'] - $numberBoook;
                                    if($ticket['max'] <= 0){
                                        $ticket['max'] = 0;
                                    }
                                }
                                if($ticket['max'] > 0){
                                    $isBook = true;
                                }
                            }
                        }
                        $allDates[$dt->format('Y-m-d')]['ticket_types'] = $list_ticket_types;
                        if($isBook == false){
                            $allDates[$date]['active'] = 0;
                            $allDates[$date]['sauna'] = __('Full Book');
                            $allDates[$date]['title'] = __('Full Book');
                            $allDates[$date]['classNames'] = ['full-book-sauna'];
                        }
                    }
                }
            }
        }


        /*if(!empty($sauna->ical_import_url)){
            $startDate = $request->query('start');
            $endDate = $request->query('end');
            $timezone = setting_item('site_timezone',config('app.timezone'));
            try {
                $icalsaunas   =  new Ical($sauna->ical_import_url,[
                    'defaultTimeZone'=>$timezone
                ]);
                $saunaRange  = $icalsaunas->saunasFromRange($startDate,$endDate);
                if(!empty($saunaRange)){
                    foreach ($saunaRange as $item=>$value){
                        if(!empty($date = $value->dtstart_array[2])){
                            $max_guests = $allDates[date('Y-m-d',$date)]['max_guests'] -1 ;
                            $allDates[date('Y-m-d',$date)]['max_guests']  = $max_guests;
                            if($max_guests ==0){
                                $allDates[date('Y-m-d',$date)]['active'] = 0;
                                $allDates[date('Y-m-d',$date)]['sauna'] = __('Full Book');
                                $allDates[date('Y-m-d',$date)]['title'] = __('Full Book');
                                $allDates[date('Y-m-d',$date)]['classNames'] = ['full-book-sauna'];
                            }
                        }
                    }
                }
            }catch (\Exception $exception){
                return $this->sendError($exception->getMessage());
            }
        }*/

        $data = array_values($allDates);

        return response()->json($data);
    }

    public function store(Request $request){

        $request->validate([
            'target_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);
        $sauna = $this->saunaClass::find($request->input('target_id'));
        $target_id = $request->input('target_id');
        if(empty($sauna)){
            return $this->sendError(__('Sauna not found'));
        }
        if(!$this->hasPermission('sauna_manage_others')){
            if($sauna->create_user != Auth::id()){
                return $this->sendError("You do not have permission to access it");
            }
        }
        $postData = $request->input();
        $period = periodDate($request->input('start_date'),$request->input('end_date'));
        foreach ($period as $dt){

            $date = $this->saunaDateClass::where('start_date',$dt->format('Y-m-d'))->where('target_id',$target_id)->first();
            if(empty($date)){
                $date = new $this->saunaDateClass();
                $date->target_id = $target_id;
            }
            $postData['start_date'] = $dt->format('Y-m-d H:i:s');
            $postData['end_date'] = $dt->format('Y-m-d H:i:s');

            $date->fillByAttr([
                'start_date','end_date','active',
            ],$postData);
            $ticket_types = $request->input("ticket_types");
            if(!empty($ticket_types)){
                foreach ( $ticket_types  as &$ticket){
                    unset($ticket['min']);
                    unset($ticket['max']);
                    unset($ticket['display_price']);
                }
            }
            $date->ticket_types = $ticket_types;
            $date->save();
        }
        return $this->sendSuccess([],__("Update Success"));
    }
}