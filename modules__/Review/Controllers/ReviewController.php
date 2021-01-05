<?php
namespace Modules\Review\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Review\Models\Review;
use Modules\Review\Models\ReviewMeta;
use Validator;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
    }

    public function addReview(Request $request,$is_return = false)
    {
        $service_type = $request->input('review_service_type');
        $service_id = $request->input('review_service_id');
        $allServices = get_bookable_services();

        if (empty($allServices[$service_type])) {
            if($is_return){
                return $this->sendError(__("Service type not found"));
            }else{
                return redirect()->to(url()->previous() . '#review-form')->with('error', __('Service type not found'));
            }
        }

        $module_class = $allServices[$service_type];
        $module = $module_class::find($service_id);
        if(empty($module)){
            if($is_return){
                return $this->sendError(__("Service not found"));
            }else{
                return redirect()->to(url()->previous() . '#review-form')->with('error', __('Service not found'));
            }
        }

        $reviewEnable = $module->getReviewEnable();
        if (!$reviewEnable) {
            if($is_return){
                return $this->sendError(__("Review not enable"));
            }else{
                return redirect()->to(url()->previous() . '#review-form')->with('error', __('Review not enable'));
            }
        }
        $reviewEnableAfterBooking = $module->check_enable_review_after_booking();
        if (!$reviewEnableAfterBooking) {
            if($is_return){
                return $this->sendError(__("You need booking before write a review"));
            }else{
                return redirect()->to(url()->previous() . '#review-form')->with('error', __('You need booking before write a review'));
            }
        }else{
            if (!$module->check_allow_review_after_making_completed_booking() ) {
                if($is_return){
                    return $this->sendError(__("You can review after making completed booking"));
                }else{
                    return redirect()->to(url()->previous() . '#review-form')->with('error', __('You can review after making completed booking'));
                }
            }
        }

        if ($module->create_user == Auth::id()) {
            if($is_return){
                return $this->sendError(__("You cannot review your service"));
            }else{
                return redirect()->to(url()->previous() . '#review-form')->with('error', __('You cannot review your service'));
            }
        }

        $rules = [
            'review_title'   => 'required',
            'review_content' => 'required|min:10'
        ];
        $messages = [
            'review_title.required'   => __('Review Title is required field'),
            'review_content.required' => __('Review Content is required field'),
            'review_content.min'      => __('Review Content has at least 10 character'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            if($is_return){
                return $this->sendError($validator->errors());
            }else{
                return redirect()->to(url()->previous() . '#review-form')->withErrors($validator->errors());
            }
        }
        $all_stats = setting_item($service_type."_review_stats");
        $review_stats = $request->input('review_stats');
        $metaReview = [];
        if (!empty($all_stats)) {
            $all_stats = json_decode($all_stats, true);
            $total_point = 0;
            foreach ($all_stats as $key => $value) {
                if (isset($review_stats[$value['title']])) {
                    $total_point += $review_stats[$value['title']];
                }
                $metaReview[] = [
                    "object_id"    => $service_id,
                    "object_model" => $service_type,
                    "name"         => $value['title'],
                    "val"          => $review_stats[$value['title']] ?? 0,
                ];
            }
            $rate = round($total_point / count($all_stats), 1);
            if ($rate > 5) {
                $rate = 5;
            }
        } else {
            $rate = $request->input('review_rate');
        }
        $review = new Review([
            "object_id"    => $service_id,
            "object_model" => $service_type,
            "title"        => $request->input('review_title'),
            "content"      => $request->input('review_content'),
            "rate_number"  => $rate ?? 0,
            "author_ip"    => $request->ip(),
            "status"       => !$module->getReviewApproved() ? "approved" : "pending",
            'vendor_id'     =>$module->create_user
        ]);
        if ($review->save()) {
            if (!empty($metaReview)) {
                foreach ($metaReview as $meta) {
                    $meta['review_id'] = $review->id;
                    $reviewMeta = new ReviewMeta($meta);
                    $reviewMeta->save();
                }
            }
            $msg = __('Review success!');
            if ($module->getReviewApproved()) {
                $msg = __("Review success! Please wait for admin approved!");
            }
            $module->update_service_rate();
            if($is_return){
                return $this->sendSuccess($msg);
            }else{
                return redirect()->to(url()->previous() . '#bravo-reviews')->with('success', $msg);
            }
        }
        if($is_return){
            return $this->sendError( __('Review error!'));
        }else{
            return redirect()->to(url()->previous() . '#review-form')->with('error', __('Review error!'));
        }
    }
}
