<?php
namespace Modules\Api\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Modules\Booking\Models\Booking;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\User\Models\UserWishList;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getBookingHistory(Request $request){
        $user_id = Auth::id();
        $query = Booking::getBookingHistory($request->input('status'), $user_id);
        $rows = [];
        foreach ($query as $item){
            $service = $item->service;
            $serviceTranslation = $service->translateOrOrigin(app()->getLocale());
            $meta_tmp = $item->getAllMeta();
            $item = $item->toArray();
            $meta = [];
            if(!empty($meta_tmp)){
                foreach ( $meta_tmp as $val){
                    $meta[ $val->name ] = !empty($json = json_decode($val->val,true)) ? $json : $val->val  ;
                }
            }
            $item['commission_type'] = json_decode( $item['commission_type'] , true);
            $item['buyer_fees'] = json_decode( $item['buyer_fees'] , true);
            $item['booking_meta'] = $meta;
            $item['service_icon'] = $service->getServiceIconFeatured() ?? null;
            $item['service'] = ['title'=>$serviceTranslation->title];
            $rows[] = $item;
        }
        return $this->sendSuccess([
            'data'=> $rows,
            'total'=>$query->total(),
            'max_pages'=>$query->lastPage()
        ]);
    }

    public function handleWishList(Request $request){
        $class = new \Modules\User\Controllers\UserWishListController();
        return $class->handleWishList($request);
    }

    public function indexWishlist(Request $request){
        $query = UserWishList::query()
            ->where("user_wishlist.user_id",Auth::id())
            ->orderBy('user_wishlist.id', 'desc')
            ->paginate(5);
        $rows = [];
        foreach ($query as $item){
            $service = $item->service;
            if(empty($service)) continue;

            $item = $item->toArray();
            $serviceTranslation = $service->translateOrOrigin(app()->getLocale());
            $item['service'] = [
                'id'=>$service->id,
                'title'=>$serviceTranslation->title,
                'price'=>$service->price,
                'sale_price'=>$service->sale_price,
                'discount_percent'=>$service->discount_percent ?? null,
                'image'=>get_file_url($service->image_id),
                'content'=>$serviceTranslation->content,
                'location' => Location::selectRaw("id,name")->find($service->location_id) ?? null,
                'is_featured' => $service->is_featured ?? null,
                'service_icon' => $service->getServiceIconFeatured() ?? null,
                'review_score' =>  $service->getScoreReview() ?? null,
                'service_type' =>  $service->getModelName() ?? null,
            ];
            $rows[] = $item;
        }
        return $this->sendSuccess(
            [
                'data'=>$rows,
                'total'=>$query->total(),
                'total_pages'=>$query->lastPage(),
            ]
        );
    }
}
