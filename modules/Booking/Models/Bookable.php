<?php

    namespace Modules\Booking\Models;

    use App\BaseModel;
    use ICal\ICal;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Modules\Location\Models\Location;
    use Modules\Media\Helpers\FileHelper;
    use Modules\Review\Models\Review;


    class Bookable extends BaseModel
    {
        public $email_new_booking_file             = '';
        public $checkout_booking_detail_modal_file = '';
        public $type                               = '';


        protected $reviewClass;

        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
            $this->reviewClass = Review::class;
        }

        public function sendError($message, $data = [])
        {
            $data['status'] = 0;
            return $this->sendSuccess($data, $message);
        }

        public function sendSuccess($data = [], $message = '')
        {
            if (!isset($data['status'])) {
                $data['status'] = 1;
            }
            $data['message'] = $message;
            return response()->json($data);
        }

        public function addToCart(Request $request)
        {

        }

        public function createDraftBooking()
        {

        }

        public function getSubTotal(Booking $booking)
        {
            return 0;
        }

        /**
         * Get Total Array Data
         */
        public function getTotalArray(Booking $booking)
        {

            $sub_total = $this->getSubTotal($booking);
            if (!$sub_total or $sub_total < 0) {
                return 0;
            }
            $discountBeforeTax = $this->calDiscountFromTotal($this->getDiscountBeforeTax($booking), $sub_total);
            $sub_total -= $discountBeforeTax;
            $tax = $this->calTaxFromTotal($this->getTaxArray($booking), $sub_total);
            if (!$this->isTaxIncluded()) {
                $sub_total += $tax;
            }
            $discountAfterTax = $this->calDiscountFromTotal($this->getDiscountAfterTax($booking), $sub_total);
            $sub_total -= $discountAfterTax;
            if (!$sub_total or $sub_total < 0) {
                return 0;
            }
            return [
                'total'             => $sub_total,
                'tax'               => $tax,
                'discountBeforeTax' => $discountBeforeTax,
                'discountAfterTax'  => $discountAfterTax,
            ];
        }

        /**
         * Get total money
         *
         * @return float
         */
        public function getTotal(Booking $booking)
        {

            $sub_total = $this->getSubTotal($booking);
            if (!$sub_total or $sub_total < 0) {
                return 0;
            }
            $sub_total -= $this->calDiscountFromTotal($this->getDiscountBeforeTax($booking), $sub_total);
            if (!$this->isTaxIncluded()) {
                $sub_total += $this->calTaxFromTotal($this->getTaxArray($booking), $sub_total);
            }
            $sub_total -= $this->calDiscountFromTotal($this->getDiscountAfterTax($booking), $sub_total);
            if (!$sub_total or $sub_total < 0) {
                return 0;
            }
            return $sub_total;
        }

        /**
         * Get Tax Array
         * Example: ['type'=>'percent','amount'=>10,'order'=>1,'name'=>'VAT']
         *
         * @return array
         */
        public function getTaxArray(Booking $booking)
        {
            return [];
        }

        /**
         * Is Tax included in Pricing
         */
        public function isTaxIncluded()
        {
            return true;
        }

        /**
         * Get Discount included coupon
         * Example: ['type'=>'percent','amount'=>10,'order'=>1,'name'=>'New year coupon']
         */
        public function getDiscountBeforeTax(Booking $booking, $sub_total = 0)
        {
            return [];
        }

        /**
         * Get Discount after tax array
         *
         * Example: ['type'=>'percent','amount'=>10,'order'=>1,'name'=>'after tax coupon']
         */
        public function getDiscountAfterTax(Booking $booking, $sub_total = 0)
        {
            return [];
        }

        public function calDiscountFromTotal($discounts, $sub_total)
        {
            $t = 0;
            $remainTotal = $sub_total;
            // Sort by Priority
            usort($discounts, function ($a, $b) {
                if ($a['order'] == $b['order']) {
                    return 0;
                }
                return $a['order'] < $b['order'] ? -1 : 1;
            });
            if (!empty($discounts)) {
                foreach ($discounts as $item) {
                    if (!isset($item['on_total'])) {
                        $item['on_total'] = false;
                    }
                    if (!isset($item['type'])) {
                        $item['type'] = 'percent';
                    }
                    if (!isset($item['amount'])) {
                        $item['amount'] = 0;
                    }
                    if (!is_array($item) or empty($item['type']) or !isset($item['on_total'])) {
                        continue;
                    }
                    switch ($item['type']) {
                        case "percent":
                            $item['amount'] = max(0, $item['amount']);
                            $item['amount'] = min(100, $item['amount']);
                            if ($item['on_total']) {
                                $t_tmp = ($sub_total / 100) * $item['amount'];
                            } else {
                                $t_tmp = ($remainTotal / 100) * $item['amount'];
                                $remainTotal -= $t_tmp;
                            }
                            $t += $t_tmp;
                            break;
                        case "amount":
                        default:
                            $remainTotal -= $item['amount'];
                            $t += $item['amount'];
                            break;
                    }
                }
            }
            return $t;
        }

        public function calTaxFromTotal($discounts, $sub_total)
        {
            $t = 0;
            $remainTotal = $sub_total;
            // Sort by Priority
            usort($discounts, function ($a, $b) {
                if ($a['order'] == $b['order']) {
                    return 0;
                }
                return $a['order'] < $b['order'] ? -1 : 1;
            });
            if (!empty($discounts)) {
                foreach ($discounts as $item) {
                    if (!isset($item['on_total'])) {
                        $item['on_total'] = false;
                    }
                    if (!isset($item['type'])) {
                        $item['type'] = 'percent';
                    }
                    if (!isset($item['amount'])) {
                        $item['amount'] = 0;
                    }
                    if (!is_array($item) or empty($item['type']) or !isset($item['on_total'])) {
                        continue;
                    }
                    switch ($item['type']) {
                        case "percent":
                            $item['amount'] = max(0, $item['amount']);
                            $item['amount'] = min(100, $item['amount']);
                            if ($item['on_total']) {
                                $t_tmp = ($sub_total / 100) * $item['amount'];
                            } else {
                                $t_tmp = ($remainTotal / 100) * $item['amount'];
                                $remainTotal += $t_tmp;
                            }
                            $t += $t_tmp;
                            break;
                        case "amount":
                        default:
                            $remainTotal += $item['amount'];
                            $t += $item['amount'];
                            break;
                    }
                }
            }
            return $t;
        }

        public function getImageUrlAttribute($size = "medium")
        {
            $url = FileHelper::url($this->image_id, $size);
            return $url ? $url : '';
        }

        public function getBannerImageUrlAttribute($size = "medium")
        {
            $url = FileHelper::url($this->banner_image_id, $size);
            return $url ? $url : '';
        }

        public function getImageUrl($size = "medium")
        {

            $url = FileHelper::url($this->image_id, $size);
            return $url ? $url : '';
        }

        /**
         * Get Location
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function location()
        {
            return $this->hasOne("Modules\Location\Models\Location", "id", 'location_id')->with(['translations']);
        }

        /**
         * @todo Simple check before booking for status, etc
         */
        public function isBookable()
        {
            return true;
        }

        public function getBookingDetailHtml(Booking $booking)
        {
            return '';
        }

        public function filterCheckoutValidate(Request $request, $rules = [])
        {
            return $rules;
        }

        public function beforeCheckout(Request $request, $booking)
        {

        }

        public function afterCheckout(Request $request, $booking)
        {

        }

        public function beforePaymentProcess($booking, $payment)
        {

        }

        public function afterPaymentProcess($booking, $payment)
        {

        }

        /**
         * Get Location
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function vendor()
        {
            return $this->hasOne("App\User", "id", 'create_user');
        }

        public function getDisplayPriceAttribute()
        {
            if (!empty($this->price) and $this->price > 0 and !empty($this->sale_price) and $this->sale_price > 0 and $this->price > $this->sale_price) {
                return format_money($this->sale_price);
            }
            return format_money($this->price);
        }

        public function getDisplayPriceAdminAttribute()
        {
            if (!empty($this->price) and $this->price > 0 and !empty($this->sale_price) and $this->sale_price > 0 and $this->price > $this->sale_price) {
                return format_money_main($this->sale_price);
            }
            return format_money_main($this->price);
        }

        public function getDisplaySalePriceAttribute()
        {
            if (!empty($this->price) and $this->price > 0 and !empty($this->sale_price) and $this->sale_price > 0 and $this->price > $this->sale_price) {
                return format_money($this->price);
            }
            return false;
        }

        public function getDisplaySalePriceAdminAttribute()
        {
            if (!empty($this->price) and $this->price > 0 and !empty($this->sale_price) and $this->sale_price > 0 and $this->price > $this->sale_price) {
                return format_money_main($this->price);
            }
            return false;
        }

        public function getBookingsInRange($from, $to)
        {

        }

        public static function getVendorServicesQuery($user_id)
        {
            return parent::query()->where([
                'create_user' => $user_id,
                'status'      => 'publish',
            ])->with('location');
        }

        public function getRecommendPercentAttribute()
        {
            $percent = 0;
            $dataTotalReview = $this->reviewClass::selectRaw(" 	COUNT( id ) AS total_review, COUNT( CASE WHEN rate_number >= 4 THEN 1 ELSE null END )  as total_review_recommend ")->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->first();
            if (!empty($dataTotalReview['total_review'])) {
                $percent = ceil((100 / $dataTotalReview['total_review']) * $dataTotalReview['total_review_recommend']);
            }
            return $percent;
        }

        public function check_enable_review_after_booking()
        {
            return true;
        }

        public function getReviewEnable()
        {
            return true;
        }

        public static function getServiceIconFeatured()
        {
            return "icofont-anchor";
        }

        public static function isEnable()
        {
            return true;
        }

        public function update_service_rate()
        {
            $rateData = $this->reviewClass::selectRaw("AVG(rate_number) as rate_total")->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->first();
            $rate_number = number_format($rateData->rate_total ?? 0, 1);
            $this->review_score = $rate_number;
            $this->save();
        }

        public function checkBusyDate($start_date, $end_date = false)
        {

//		if(!empty($this->ical_import_url)){
//			try{
//				if($end_date==false){
//					$end_date=$start_date;
//				}
//
//				$timezone = setting_item('site_timezone',config('app.timezone'));
//
//				$icalevents   =  new Ical($this->ical_import_url,[
//					'defaultTimeZone'=>$timezone
//				]);
//				if($icalevents->hasEvents()){
//					$busy= $icalevents->eventsFromRange(Carbon::make($start_date),Carbon::make($end_date));
//					if(!empty($busy)){
//						return false;
//					}
//				}
//			}catch (\Exception $e){
//				echo $e->getMessage();
//			}
//		}
            return true;
        }

        public static function search(Request $request)
        {
            return [];
        }

        public function dataForApi($forSingle = false)
        {
            $translation = $this->translateOrOrigin(app()->getLocale());
            $data = [
                'id'               => $this->id,
                'title'            => $translation->title,
                'price'            => $this->price,
                'sale_price'       => $this->sale_price,
                'discount_percent' => $this->discount_percent ?? null,
                'image'            => get_file_url($this->image_id),
                'content'          => $translation->content,
                'location'         => Location::selectRaw("id,name")->find($this->location_id) ?? null,
                'is_featured'      => $this->is_featured ?? null,
            ];
            if ($forSingle) {
                $data["address"] = $this->address;
                $data["map_lat"] = $this->map_lat;
                $data["map_lng"] = $this->map_lng;
                $data["map_zoom"] = $this->map_zoom;
                $data["banner_image"] = get_file_url($this->banner_image_id, 'full');
                if (!empty($this->gallery)) {
                    $galleries = explode(",", $this->gallery);
                    foreach ($galleries as $item) {
                        $data["gallery"][] = get_file_url($item, 'full');
                    }
                }
                $data["video"] = $this->video;
                $data["enable_extra_price"] = $this->enable_extra_price ?? 0;
                $data["extra_price"] = $this->extra_price ?? null;
            }
            return $data;
        }
    }
