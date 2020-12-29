<?php

namespace Modules\Car\Models;

use App\Currency;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Booking\Models\Bookable;
use Modules\Booking\Models\Booking;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\SEO;
use Modules\Core\Models\Terms;
use Modules\Media\Helpers\FileHelper;
use Modules\Review\Models\Review;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Car\Models\CarTranslation;
use Modules\User\Models\UserWishList;
use Modules\Location\Models\Location;

class Car extends Bookable
{
    use SoftDeletes;
    protected $table = 'bravo_cars';
    public $type = 'car';
    public $checkout_booking_detail_file       = 'Car::frontend/booking/detail';
    public $checkout_booking_detail_modal_file = 'Car::frontend/booking/detail-modal';
    public $email_new_booking_file             = 'Car::emails.new_booking_detail';
    public $availabilityClass = CarDate::class;

    protected $fillable = [
        'title',
        'content',
        'status',
        'faqs'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'title';
    protected $seo_type = 'car';

    protected $casts = [
        'faqs'  => 'array',
        'extra_price'  => 'array',
        'price'=>'float',
        'sale_price'=>'float',
    ];
    /**
     * @var Booking
     */
    protected $bookingClass;
    /**
     * @var Review
     */
    protected $reviewClass;

    /**
     * @var CarDate
     */
    protected $carDateClass;

    /**
     * @var CarTerm
     */
    protected $carTermClass;

    protected $carTranslationClass;
    protected $userWishListClass;

    protected $tmp_price = 0;
    protected $tmp_dates = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->bookingClass = Booking::class;
        $this->reviewClass = Review::class;
        $this->carDateClass = CarDate::class;
        $this->carTermClass = CarTerm::class;
        $this->carTranslationClass = CarTranslation::class;
        $this->userWishListClass = UserWishList::class;
    }

    public static function getModelName()
    {
        return __("Car");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }


    /**
     * Get SEO fop page list
     *
     * @return mixed
     */
    static public function getSeoMetaForPageList()
    {
        $meta['seo_title'] = __("Search for Cars");
        if (!empty($title = setting_item_with_lang("car_page_list_seo_title",false))) {
            $meta['seo_title'] = $title;
        }else if(!empty($title = setting_item_with_lang("car_page_search_title"))) {
            $meta['seo_title'] = $title;
        }
        $meta['seo_image'] = null;
        if (!empty($title = setting_item("car_page_list_seo_image"))) {
            $meta['seo_image'] = $title;
        }else if(!empty($title = setting_item("car_page_search_banner"))) {
            $meta['seo_image'] = $title;
        }
        $meta['seo_desc'] = setting_item_with_lang("car_page_list_seo_desc");
        $meta['seo_share'] = setting_item_with_lang("car_page_list_seo_share");
        $meta['full_url'] = url(config('car.car_route_prefix'));
        return $meta;
    }


    public function terms(){
        return $this->hasMany($this->carTermClass, "target_id");
    }

    public function getDetailUrl($include_param = true)
    {
        $param = [];
        if($include_param){
            if(!empty($date =  request()->input('date'))){
                $dates = explode(" - ",$date);
                if(!empty($dates)){
                    $param['start'] = $dates[0] ?? "";
                    $param['end'] = $dates[1] ?? "";
                }
            }
            if(!empty($adults =  request()->input('adults'))){
                $param['adults'] = $adults;
            }
            if(!empty($children =  request()->input('children'))){
                $param['children'] = $children;
            }
        }
        $urlDetail = app_get_locale(false, false, '/') . config('car.car_route_prefix') . "/" . $this->slug;
        if(!empty($param)){
            $urlDetail .= "?".http_build_query($param);
        }
        return url($urlDetail);
    }

    public static function getLinkForPageSearch( $locale = false , $param = [] ){

        return url(app_get_locale(false , false , '/'). config('car.car_route_prefix')."?".http_build_query($param));
    }

    public function getGallery($featuredIncluded = false)
    {
        if (empty($this->gallery))
            return $this->gallery;
        $list_item = [];
        if ($featuredIncluded and $this->image_id) {
            $list_item[] = [
                'large' => FileHelper::url($this->image_id, 'full'),
                'thumb' => FileHelper::url($this->image_id, 'thumb')
            ];
        }
        $items = explode(",", $this->gallery);
        foreach ($items as $k => $item) {
            $large = FileHelper::url($item, 'full');
            $thumb = FileHelper::url($item, 'thumb');
            $list_item[] = [
                'large' => $large,
                'thumb' => $thumb
            ];
        }
        return $list_item;
    }

    public function getEditUrl()
    {
        return url(route('car.admin.edit',['id'=>$this->id]));
    }

    public function getDiscountPercentAttribute()
    {
        if (    !empty($this->price) and $this->price > 0
            and !empty($this->sale_price) and $this->sale_price > 0
            and $this->price > $this->sale_price
        ) {
            $percent = 100 - ceil($this->sale_price / ($this->price / 100));
            return $percent . "%";
        }
    }

    public function fill(array $attributes)
    {
        if(!empty($attributes)){
            foreach ( $this->fillable as $item ){
                $attributes[$item] = $attributes[$item] ?? null;
            }
        }
        return parent::fill($attributes); // TODO: Change the autogenerated stub
    }

    public function isBookable()
    {
        if ($this->status != 'publish')
            return false;
        return parent::isBookable();
    }

    public function addToCart(Request $request)
    {
        $res = $this->addToCartValidate($request);
        if($res !== true) return $res;
        // Add Booking
        $total_guests = 0;
        $start_date = new \DateTime($request->input('start_date'));
        $end_date = new \DateTime($request->input('end_date'));
        $extra_price_input = $request->input('extra_price');
        $extra_price = [];
        $number = $request->input('number',1);

        $total = $this->tmp_price * $number;

        $duration_in_day = max(1,ceil(($end_date->getTimestamp() - $start_date->getTimestamp()) / DAY_IN_SECONDS ) + 1 );
        if ($this->enable_extra_price and !empty($this->extra_price)) {
            if (!empty($this->extra_price)) {
                foreach ($this->extra_price as $k => $type) {
                    if (isset($extra_price_input[$k]) and $extra_price_input[$k]['enable'] and $extra_price_input[$k]['enable'] != 'false') {
                        $type_total = 0;
                        switch ($type['type']) {
                            case "one_time":
                                $type_total = $type['price'] * $number;
                                break;
                            case "per_day":
                                $type_total = $type['price'] * $duration_in_day * $number;
                                break;
                        }
                        $type['total'] = $type_total;
                        $total += $type_total;
                        $extra_price[] = $type;
                    }
                }
            }
        }

        //Buyer Fees
        $total_before_fees = $total;
        $list_fees = setting_item('car_booking_buyer_fees');
        if (!empty($list_fees)) {
            $total_fee = 0;
            $lists = json_decode($list_fees, true);
            foreach ($lists as $item) {
                //for Fixed
                $fee_price = $item['price'];
                // for Percent
                if(!empty($item['unit']) and $item['unit'] == "percent"){
                    $fee_price = ( $total_before_fees / 100 ) * $item['price'];
                }
                if (!empty($item['per_person']) and $item['per_person'] == "on") {
                    $total_fee += $fee_price * $total_guests;
                } else {
                    $total_fee += $fee_price;
                }
            }
            $total += $total_fee;
        }

        if (empty($start_date) or empty($end_date)) {
            return $this->sendError(__("Your selected dates are not valid"));
        }
        $booking = new $this->bookingClass();
        $booking->status = 'draft';
        $booking->object_id = $request->input('service_id');
        $booking->object_model = $request->input('service_type');
        $booking->vendor_id = $this->create_user;
        $booking->customer_id = Auth::id();
        $booking->total = $total;
        $booking->total_guests = 1;
        $booking->start_date = $start_date->format('Y-m-d H:i:s');
        $booking->end_date = $end_date->format('Y-m-d H:i:s');
        $booking->buyer_fees = $list_fees ?? '';
        $booking->total_before_fees = $total_before_fees;
        $booking->calculateCommission();
        $booking->number = $number;

        if($this->isDepositEnable())
        {
            $booking_deposit_fomular = $this->getDepositFomular();
            $tmp_price_total = $booking->total;
            if($booking_deposit_fomular == "deposit_and_fee"){
                $tmp_price_total = $booking->total_before_fees;
            }

            switch ($this->getDepositType()){
                case "percent":
                    $booking->deposit = $tmp_price_total * $this->getDepositAmount() / 100;
                    break;
                default:
                    $booking->deposit = $this->getDepositAmount();
                    break;
            }
            if($booking_deposit_fomular == "deposit_and_fee"){
                $booking->deposit = $booking->deposit + $total_fee;
            }
        }

        $check = $booking->save();
        if ($check) {

            $this->bookingClass::clearDraftBookings();
            $booking->addMeta('duration', $this->duration);
            $booking->addMeta('base_price', $this->price);
            $booking->addMeta('sale_price', $this->sale_price);
            $booking->addMeta('extra_price', $extra_price);
            $booking->addMeta('tmp_dates', $this->tmp_dates);
            if($this->isDepositEnable())
            {
                $booking->addMeta('deposit_info',[
                    'type'=>$this->getDepositType(),
                    'amount'=>$this->getDepositAmount(),
                    'fomular'=>$this->getDepositFomular(),
                ]);
            }

            return $this->sendSuccess([
                'url' => $booking->getCheckoutUrl(),
                'booking_code' => $booking->code,
            ]);
        }
        return $this->sendError(__("Can not check availability"));
    }

    public function addToCartValidate(Request $request)
    {
        $rules = [
            'number' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d'
        ];

        // Validation
        if (!empty($rules)) {
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $this->sendError('', ['errors' => $validator->errors()]);
            }

        }
        $total_number = $request->input('number');

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if(strtotime($start_date) < strtotime(date('Y-m-d 00:00:00')) or strtotime($start_date) > strtotime($end_date))
        {
            return $this->sendError(__("Your selected dates are not valid"));
        }

        // Validate Date and Booking
        if(!$this->isAvailableInRanges($start_date,$end_date,$total_number)){
            return $this->sendError(__("This car is not available at selected dates"));
        }

        return true;
    }

    public function isAvailableInRanges($start_date,$end_date,$number = 1){

        $allDates = [];
//        for($i = strtotime($start_date); $i <= strtotime($end_date); $i += DAY_IN_SECONDS){
//
//            $allDates[date('Y-m-d',$i)] = [
//                'number'=>$this->number,
//                'price'=>($this->sale_price && $this->sale_price < $this->price) ? $this->sale_price : $this->price,
//                'status'=>$this->default_state
//            ];
//        }


        $period = periodDate($start_date,$end_date);
        foreach ($period as $dt) {
            $allDates[$dt->format('Y-m-d')] = [
                'number'=>$this->number,
                'price'=>($this->sale_price && $this->sale_price < $this->price) ? $this->sale_price : $this->price,
                'status'=>$this->default_state
            ];
        }

        $datesData = $this->getDatesInRange($start_date,$end_date);

        if(!empty($datesData)){
            foreach ($datesData as $date)
            {
                if(empty($allDates[date('Y-m-d',strtotime($date->start_date))])) continue;
                if(!$date->active or !$date->number or !$date->price) return false;

                $allDates[date('Y-m-d',strtotime($date->start_date))] = [
                    'number'=>$date->number,
                    'price'=>$date->price,
                    'status'=>true
                ];
            }
        }

        $bookingData = $this->getBookingsInRange($start_date,$end_date);
        if(!empty($bookingData)){
            foreach ($bookingData as $booking){
                $period = periodDate($booking->start_date,$booking->end_date);
                foreach ($period as $dt) {
                   $date = $dt->format('Y-m-d');
                    if(!array_key_exists($date,$allDates)) continue;
                    $allDates[$date]['number'] -= $booking->number;
                    if($allDates[$date]['number'] <= 0){
                        return false;
                    }
                }
            }
        }

        if(empty($allDates)) return false;
        foreach ($allDates as $date=>$data)
        {
            if($data['number'] < $number){
                return false;
            }
        }

        $this->tmp_price = array_sum(array_column($allDates,'price'));
        $this->tmp_dates = $allDates;

        return true;
    }
    public function getDatesInRange($start_date,$end_date)
    {
        $query = $this->carDateClass::query();
        $query->where('target_id',$this->id);
        $query->where('start_date','>=',date('Y-m-d H:i:s',strtotime($start_date)));
        $query->where('end_date','<=',date('Y-m-d H:i:s',strtotime($end_date)));

        return $query->take(40)->get();
    }

    public function getBookingData()
    {
        if (!empty($start = request()->input('start'))) {
            $start_html = display_date($start);
            $end_html = request()->input('end') ? display_date(request()->input('end')) : "";
            $date_html = $start_html . '<i class="fa fa-long-arrow-right" style="font-size: inherit"></i>' . $end_html;
        }
        $booking_data = [
            'id'              => $this->id,
            'extra_price'     => [],
            'minDate'         => date('m/d/Y'),
            'max_number'      => $this->number ?? 1,
            'buyer_fees'      => [],
            'start_date'      => request()->input('start') ?? "",
            'start_date_html' => $date_html ?? __('Please select'),
            'end_date'        => request()->input('end') ?? "",
            'deposit'=>$this->isDepositEnable(),
            'deposit_type'=>$this->getDepositType(),
            'deposit_amount'=>$this->getDepositAmount(),
            'deposit_fomular'=>$this->getDepositFomular(),
            'is_form_enquiry_and_book'=> $this->isFormEnquiryAndBook(),
            'enquiry_type'=> $this->getBookingEnquiryType(),
        ];
        $lang = app()->getLocale();
        if ($this->enable_extra_price) {
            $booking_data['extra_price'] = $this->extra_price;
            if (!empty($booking_data['extra_price'])) {
                foreach ($booking_data['extra_price'] as $k => &$type) {
                    if (!empty($lang) and !empty($type['name_' . $lang])) {
                        $type['name'] = $type['name_' . $lang];
                    }
                    $type['number'] = 0;
                    $type['enable'] = 0;
                    $type['price_html'] = format_money($type['price']);
                    $type['price_type'] = '';
                    switch ($type['type']) {
                        case "per_day":
                            $type['price_type'] .= '/' . __('day');
                            break;
                        case "per_hour":
                            $type['price_type'] .= '/' . __('hour');
                            break;
                    }
                    if (!empty($type['per_person'])) {
                        $type['price_type'] .= '/' . __('guest');
                    }
                }
            }

            $booking_data['extra_price'] = array_values((array)$booking_data['extra_price']);
        }

        $list_fees = setting_item_array('car_booking_buyer_fees');
        if(!empty($list_fees)){
            foreach ($list_fees as $item){
                $item['type_name'] = $item['name_'.app()->getLocale()] ?? $item['name'] ?? '';
                $item['type_desc'] = $item['desc_'.app()->getLocale()] ?? $item['desc'] ?? '';
                $item['price_type'] = '';
                if (!empty($item['per_person']) and $item['per_person'] == 'on') {
                    $item['price_type'] .= '/' . __('guest');
                }
                $booking_data['buyer_fees'][] = $item;
            }
        }
        return $booking_data;
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'title as name');
        if (strlen($q)) {

            $query->where('title', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public static function getMinMaxPrice()
    {
        $model = parent::selectRaw('MIN( CASE WHEN sale_price > 0 THEN sale_price ELSE ( price ) END ) AS min_price ,
                                    MAX( CASE WHEN sale_price > 0 THEN sale_price ELSE ( price ) END ) AS max_price ')->where("status", "publish")->first();
        if (empty($model->min_price) and empty($model->max_price)) {
            return [
                0,
                100
            ];
        }
        return [
            $model->min_price,
            $model->max_price
        ];
    }

    public function getReviewEnable()
    {
        return setting_item("car_enable_review", 0);
    }

    public function getReviewApproved()
    {
        return setting_item("car_review_approved", 0);
    }

    public function check_enable_review_after_booking()
    {
        $option = setting_item("car_enable_review_after_booking", 0);
        if ($option) {
            $number_review = $this->reviewClass::countReviewByServiceID($this->id, Auth::id()) ?? 0;
            $number_booking = $this->bookingClass::countBookingByServiceID($this->id, Auth::id()) ?? 0;
            if ($number_review >= $number_booking) {
                return false;
            }
        }
        return true;
    }

    public function check_allow_review_after_making_completed_booking()
    {
        $options = setting_item("car_allow_review_after_making_completed_booking", false);
        if (!empty($options)) {
            $status = json_decode($options);
            $booking = $this->bookingClass::select("status")
                ->where("object_id", $this->id)
                ->where("object_model", $this->type)
                ->where("customer_id", Auth::id())
                ->orderBy("id","desc")
                ->first();
            $booking_status = $booking->status ?? false;
            if(!in_array($booking_status , $status)){
                return false;
            }
        }
        return true;
    }

    public static function getReviewStats()
    {
        $reviewStats = [];
        if (!empty($list = setting_item("car_review_stats", []))) {
            $list = json_decode($list, true);
            foreach ($list as $item) {
                $reviewStats[] = $item['title'];
            }
        }
        return $reviewStats;
    }

    public function getReviewDataAttribute()
    {
        $list_score = [
            'score_total'  => 0,
            'score_text'   => __("Not rated"),
            'total_review' => 0,
            'rate_score'   => [],
        ];
        $dataTotalReview = $this->reviewClass::selectRaw(" AVG(rate_number) as score_total , COUNT(id) as total_review ")->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->first();
        if (!empty($dataTotalReview->score_total)) {
            $list_score['score_total'] = number_format($dataTotalReview->score_total, 1);
            $list_score['score_text'] = Review::getDisplayTextScoreByLever(round($list_score['score_total']));
        }
        if (!empty($dataTotalReview->total_review)) {
            $list_score['total_review'] = $dataTotalReview->total_review;
        }
        $list_data_rate = $this->reviewClass::selectRaw('COUNT( CASE WHEN rate_number = 5 THEN rate_number ELSE NULL END ) AS rate_5,
                                                            COUNT( CASE WHEN rate_number = 4 THEN rate_number ELSE NULL END ) AS rate_4,
                                                            COUNT( CASE WHEN rate_number = 3 THEN rate_number ELSE NULL END ) AS rate_3,
                                                            COUNT( CASE WHEN rate_number = 2 THEN rate_number ELSE NULL END ) AS rate_2,
                                                            COUNT( CASE WHEN rate_number = 1 THEN rate_number ELSE NULL END ) AS rate_1 ')->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->first()->toArray();
        for ($rate = 5; $rate >= 1; $rate--) {
            if (!empty($number = $list_data_rate['rate_' . $rate])) {
                $percent = ($number / $list_score['total_review']) * 100;
            } else {
                $percent = 0;
            }
            $list_score['rate_score'][$rate] = [
                'title'   => $this->reviewClass::getDisplayTextScoreByLever($rate),
                'total'   => $number,
                'percent' => round($percent),
            ];
        }
        return $list_score;
    }

    /**
     * Get Score Review
     *
     * Using for loop space
     */
    public function getScoreReview()
    {
        $car_id = $this->id;
        $list_score = Cache::rememberForever('review_'.$this->type.'_' . $car_id, function () use ($car_id) {
            $dataReview = $this->reviewClass::selectRaw(" AVG(rate_number) as score_total , COUNT(id) as total_review ")->where('object_id', $car_id)->where('object_model', "car")->where("status", "approved")->first();
            $score_total = !empty($dataReview->score_total) ? number_format($dataReview->score_total, 1) : 0;
            return [
                'score_total'  => $score_total,
                'total_review' => !empty($dataReview->total_review) ? $dataReview->total_review : 0,
            ];
        });
        $list_score['review_text'] =  $list_score['score_total'] ? Review::getDisplayTextScoreByLever( round( $list_score['score_total'] )) : __("Not rated");
        return $list_score;
    }

    public function getNumberReviewsInService($status = false)
    {
        return $this->reviewClass::countReviewByServiceID($this->id, false, $status,$this->type) ?? 0;
    }

    public function getReviewList(){
        return $this->reviewClass::select(['id','title','content','rate_number','author_ip','status','created_at','vendor_id','create_user'])->where('object_id', $this->id)->where('object_model', 'car')->where("status", "approved")->orderBy("id", "desc")->with('author')->paginate(setting_item('car_review_number_per_page', 5));
    }

    public function getNumberServiceInLocation($location)
    {
        $number = 0;
        if(!empty($location)) {
            $number = parent::join('bravo_locations', function ($join) use ($location) {
                $join->on('bravo_locations.id', '=', $this->table.'.location_id')->where('bravo_locations._lft', '>=', $location->_lft)->where('bravo_locations._rgt', '<=', $location->_rgt);
            })->where($this->table.".status", "publish")->with(['translations'])->count($this->table.".id");
        }
        if(empty($number)) return false;
        if ($number > 1) {
            return __(":number Cars", ['number' => $number]);
        }
        return __(":number Car", ['number' => $number]);
    }

    /**
     * @param $from
     * @param $to
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBookingsInRange($from,$to){

        $query = $this->bookingClass::query();
        $query->whereNotIn('status',$this->bookingClass::$notAcceptedStatus);
        $query->where('start_date','<=',$to)->where('end_date','>=',$from)->take(50);

        $query->where('object_id',$this->id);
        $query->where('object_model',$this->type);

        return $query->orderBy('id','asc')->get();

    }

    public function saveCloneByID($clone_id){
        $old = parent::find($clone_id);
        if(empty($old)) return false;
        $selected_terms = $old->terms->pluck('term_id');
        $old->title = $old->title." - Copy";
        $new = $old->replicate();
        $new->save();
        //Terms
        foreach ($selected_terms as $term_id) {
            $this->carTermClass::firstOrCreate([
                'term_id' => $term_id,
                'target_id' => $new->id
            ]);
        }
        //Language
        $langs = $this->carTranslationClass::where("origin_id",$old->id)->get();
        if(!empty($langs)){
            foreach ($langs as $lang){
                $langNew = $lang->replicate();
                $langNew->origin_id = $new->id;
                $langNew->save();
                $langSeo = SEO::where('object_id', $lang->id)->where('object_model', $lang->getSeoType()."_".$lang->locale)->first();
                if(!empty($langSeo)){
                    $langSeoNew = $langSeo->replicate();
                    $langSeoNew->object_id = $langNew->id;
                    $langSeoNew->save();
                }
            }
        }
        //SEO
        $metaSeo = SEO::where('object_id', $old->id)->where('object_model', $this->seo_type)->first();
        if(!empty($metaSeo)){
            $metaSeoNew = $metaSeo->replicate();
            $metaSeoNew->object_id = $new->id;
            $metaSeoNew->save();
        }
    }

    public function hasWishList(){
        return $this->hasOne($this->userWishListClass, 'object_id','id')->where('object_model' , $this->type)->where('user_id' , Auth::id() ?? 0);
    }

    public function isWishList()
    {
        if(Auth::id()){
            if(!empty($this->hasWishList) and !empty($this->hasWishList->id)){
                return 'active';
            }
        }
        return '';
    }
    public static function getServiceIconFeatured(){
        return "icofont-car";
    }

    public static function isEnable(){
        return setting_item('car_disable') == false;
    }


    public function getBookingInRanges($object_id,$object_model,$from,$to,$object_child_id = false){

        $query = $this->bookingClass::selectRaw(" * , SUM( number ) as total_numbers ")->where([
            'object_id'=>$object_id,
            'object_model'=>$object_model,
        ])->whereNotIn('status',$this->bookingClass::$notAcceptedStatus)
            ->where('end_date','>=',$from)
            ->where('start_date','<=',$to)
            ->groupBy('start_date')
            ->take(200);

        if($object_child_id){
            $query->where('object_child_id',$object_child_id);
        }

        return $query->get();
    }

    public function isDepositEnable(){
        return (setting_item('car_deposit_enable') and setting_item('car_deposit_amount'));
    }
    public function getDepositAmount(){
        return setting_item('car_deposit_amount');
    }
    public function getDepositType(){
        return setting_item('car_deposit_type');
    }
    public function getDepositFomular(){
        return setting_item('car_deposit_fomular','default');
    }
	public function detailBookingEachDate($booking){
		$startDate = $booking->start_date;
		$endDate = $booking->end_date;
		$rowDates= json_decode($booking->getMeta('tmp_dates'));

		$allDates=[];
		$service = $booking->service;
        $period = periodDate($startDate,$endDate);
        foreach ($period as $dt) {

			$price = (!empty($service->sale_price) and $service->sale_price > 0 and $service->sale_price < $service->price) ? $service->sale_price : $service->price;
			$date['price'] =$price;
			$date['price_html'] = format_money($price);
			$date['from'] = $dt->getTimestamp();
			$date['from_html'] = $dt->format('d/m/Y');
			$date['to'] = $dt->getTimestamp();
			$date['to_html'] = $dt->format('d/m/Y');
			$allDates[$dt->format(('Y-m-d'))] = $date;
		}

		if(!empty($rowDates))
		{
			foreach ($rowDates as $item => $row)
			{
				$startDate = strtotime($item);
				$price = $row->price;
				$date['price'] = $price;
				$date['price_html'] = format_money($price);
				$date['from'] = $startDate;
				$date['from_html'] = date('d/m/Y',$startDate);
				$date['to'] = $startDate;
				$date['to_html'] = date('d/m/Y',($startDate));
				$allDates[date('Y-m-d',$startDate)] = $date;
			}
		}
		return $allDates;
	}

    public static function isEnableEnquiry(){
        if(!empty(setting_item('booking_enquiry_for_car'))){
            return true;
        }
        return false;
    }
    public static function isFormEnquiryAndBook(){
        $check = setting_item('booking_enquiry_for_car');
        if(!empty($check) and setting_item('booking_enquiry_type') == "booking_and_enquiry" ){
            return true;
        }
        return false;
    }
    public static function getBookingEnquiryType(){
        $check = setting_item('booking_enquiry_for_car');
        if(!empty($check)){
            if( setting_item('booking_enquiry_type') == "only_enquiry" ) {
                return "enquiry";
            }
        }
        return "book";
    }


    public static function search(Request $request)
    {
        $model_car = parent::query()->select("bravo_cars.*");
        $model_car->where("bravo_cars.status", "publish");
        if (!empty($location_id = $request->query('location_id'))) {
            $location = Location::query()->where('id', $location_id)->where("status","publish")->first();
            if(!empty($location)){
                $model_car->join('bravo_locations', function ($join) use ($location) {
                    $join->on('bravo_locations.id', '=', 'bravo_cars.location_id')
                        ->where('bravo_locations._lft', '>=', $location->_lft)
                        ->where('bravo_locations._rgt', '<=', $location->_rgt);
                });
            }
        }
        if (!empty($price_range = $request->query('price_range'))) {
            $pri_from = explode(";", $price_range)[0];
            $pri_to = explode(";", $price_range)[1];
            $raw_sql_min_max = "( (IFNULL(bravo_cars.sale_price,0) > 0 and bravo_cars.sale_price >= ? ) OR (IFNULL(bravo_cars.sale_price,0) <= 0 and bravo_cars.price >= ? ) ) 
                            AND ( (IFNULL(bravo_cars.sale_price,0) > 0 and bravo_cars.sale_price <= ? ) OR (IFNULL(bravo_cars.sale_price,0) <= 0 and bravo_cars.price <= ? ) )";
            $model_car->WhereRaw($raw_sql_min_max,[$pri_from,$pri_from,$pri_to,$pri_to]);
        }

        $terms = $request->query('terms');
        if($term_id = $request->query('term_id'))
        {
            $terms[] = $term_id;
        }
        if (is_array($terms) && !empty($terms)) {
            $model_car->join('bravo_car_term as tt', 'tt.target_id', "bravo_cars.id")->whereIn('tt.term_id', $terms);
        }
        $review_scores = $request->query('review_score');
        if (is_array($review_scores) && !empty($review_scores)) {
            $where_review_score = [];
            foreach ($review_scores as $number){
                $where_review_score[] = " ( bravo_cars.review_score >= {$number} AND bravo_cars.review_score <= {$number}.9 ) ";
            }
            $sql_where_review_score = " ( " . implode("OR", $where_review_score) . " )  ";
            $model_car->WhereRaw($sql_where_review_score);
        }
        if(!empty( $service_name = $request->query("service_name") )){
            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app()->getLocale() ){
                $model_car->leftJoin('bravo_car_translations', function ($join) {
                    $join->on('bravo_cars.id', '=', 'bravo_car_translations.origin_id');
                });
                $model_car->where('bravo_car_translations.title', 'LIKE', '%' . $service_name . '%');

            }else{
                $model_car->where('bravo_cars.title', 'LIKE', '%' . $service_name . '%');
            }
        }
        if(!empty($lat = $request->query('map_lat')) and !empty($lgn = $request->query('map_lgn'))){
//            ORDER BY (POW((lon-$lon),2) + POW((lat-$lat),2))";
            $model_car->orderByRaw("POW((bravo_cars.map_lng-".$lgn."),2) + POW((bravo_cars.map_lat-".$lat."),2)");
        }
        $orderby = $request->input("orderby");
        switch ($orderby){
            case "price_low_high":
                $raw_sql = "CASE WHEN IFNULL( bravo_cars.sale_price, 0 ) > 0 THEN bravo_cars.sale_price ELSE bravo_cars.price END AS tmp_min_price";
                $model_car->selectRaw($raw_sql);
                $model_car->orderBy("tmp_min_price", "asc");
                break;
            case "price_high_low":
                $raw_sql = "CASE WHEN IFNULL( bravo_cars.sale_price, 0 ) > 0 THEN bravo_cars.sale_price ELSE bravo_cars.price END AS tmp_min_price";
                $model_car->selectRaw($raw_sql);
                $model_car->orderBy("tmp_min_price", "desc");
                break;
            case "rate_high_low":
                $model_car->orderBy("review_score", "desc");
                break;
            default:
                $model_car->orderBy("is_featured", "desc");
                $model_car->orderBy("id", "desc");
        }

        $model_car->groupBy("bravo_cars.id");

        $max_guests = (int)($request->query('adults') + $request->query('children'));
        if($max_guests){
            $model_car->where('max_guests','>=',$max_guests);
        }

        if(!empty($request->query('limit'))){
            $limit = $request->query('limit');
        }else{
            $limit = !empty(setting_item("car_page_limit_item"))? setting_item("car_page_limit_item") : 9;
        }

        return $model_car->with(['location','hasWishList','translations'])->paginate($limit);
    }

    public function dataForApi($forSingle = false){
        $data = parent::dataForApi($forSingle);
        $data['passenger'] = $this->passenger;
        $data['gear'] = $this->gear;
        $data['baggage'] = $this->baggage;
        $data['door'] = $this->door;
        if($forSingle){
            $data['review_score'] = $this->getReviewDataAttribute();
            $data['review_stats'] = $this->getReviewStats();
            $data['review_lists'] = $this->getReviewList();
            $data['faqs'] = $this->faqs;
            $data['is_instant'] = $this->is_instant;
            $data['number'] = $this->number;
            $data['discount_by_days'] = $this->discount_by_days;
            $data['default_state'] = $this->default_state;
            $data['booking_fee'] = setting_item_array('car_booking_buyer_fees');
            if (!empty($location_id = $this->location_id)) {
                $related =  parent::query()->where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$this->id])->with(['location','translations','hasWishList'])->get();
                $data['related'] = $related->map(function ($related) {
                        return $related->dataForApi();
                    }) ?? null;
            }
            $data['terms'] = Terms::getTermsByIdForAPI($this->terms->pluck('term_id'));
        }else{
            $data['review_score'] = $this->getScoreReview();
        }
        return $data;
    }

    static public function getClassAvailability()
    {
        return "\Modules\Car\Controllers\AvailabilityController";
    }

    static public function getFiltersSearch()
    {
        $min_max_price = self::getMinMaxPrice();
        return [
            [
                "title"    => __("Filter Price"),
                "field"    => "price_range",
                "position" => "1",
                "min_price" => floor ( Currency::convertPrice($min_max_price[0]) ),
                "max_price" => ceil (Currency::convertPrice($min_max_price[1]) ),
            ],
            [
                "title"    => __("Review Score"),
                "field"    => "review_score",
                "position" => "2",
                "min" => "1",
                "max" => "5",
            ],
            [
                "title"    => __("Attributes"),
                "field"    => "terms",
                "position" => "3",
                "data" => Attributes::getAllAttributesForApi("car")
            ]
        ];
    }
}
