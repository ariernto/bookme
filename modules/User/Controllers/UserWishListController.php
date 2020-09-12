<?php
namespace Modules\User\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\User\Models\UserWishList;
use Illuminate\Http\Request;

class UserWishListController extends FrontendController
{
    protected $userWishListClass;
    public function __construct()
    {
        parent::__construct();
        $this->userWishListClass = UserWishList::class;
    }

    public function index(Request $request){
        $wishlist = $this->userWishListClass::query()
            ->where("user_wishlist.user_id",Auth::id())
            ->orderBy('user_wishlist.id', 'desc');
        $data = [
            'rows' => $wishlist->paginate(5),
            'breadcrumbs'        => [
                [
                    'name'  => __('Wishlist'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Wishlist"),
        ];
        return view('User::frontend.wishList.index', $data);
    }
    public function handleWishList(Request $request){
        $object_id = $request->input('object_id');
        $object_model = $request->input('object_model');
        if(empty($object_id))
        {
            return $this->sendError(__("Service ID is required"));
        }
        if(empty($object_model))
        {
            return $this->sendError(__("Service type is required"));
        }
        $allServices = get_bookable_services();
        if (empty($allServices[$object_model])) {
            return $this->sendError(__('Service type not found'));
        }
        $meta = $this->userWishListClass::where("object_id",$object_id)
            ->where("object_model",$object_model)
            ->where("user_id",Auth::id())
            ->first();
        if(!empty($meta)){
            $meta->delete();
            return $this->sendSuccess(['class'=>""]);
        }
        $meta = new $this->userWishListClass($request->input());
        $meta->user_id = Auth::id();
        $meta->save();
        return $this->sendSuccess(['class'=>"active"]);
    }
    public function remove(Request $request){
        $meta = $this->userWishListClass::where("object_id",$request->input('id'))
            ->where("object_model",$request->input('type'))
            ->where("user_id",Auth::id())
            ->first();
        if(!empty($meta)){
            $meta->delete();
            return redirect()->back()->with('success', __('Delete success!'));
        }
        return redirect()->back()->with('success', __('Delete fail!'));
    }
}
