<?php
namespace Modules\Api\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends \Modules\Review\Controllers\ReviewController
{
    public function writeReview(Request $request , $type = '',$id = ''){
        if(!Auth::check()){
            return $this->sendError(__("You have to login in to do this"))->setStatusCode(401);
        }
         $request->merge(['review_service_type' => $type]);
         $request->merge(['review_service_id' => $id]);
         return parent::addReview($request,true);
    }
}
