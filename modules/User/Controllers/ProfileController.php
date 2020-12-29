<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/17/2019
 * Time: 3:05 PM
 */
namespace Modules\User\Controllers;

use App\User;
use Illuminate\Http\Request;
use Modules\FrontendController;

class ProfileController extends FrontendController
{
    public function profile(Request $request,$id){
        $user = User::find($id);
        if(empty($user)){
            abort(404);
        }
        if(!$user->hasPermissionTo('dashboard_vendor_access'))
        {
            return redirect('/');
        }
        $data['user'] = $user;
        $data['page_title'] = $user->getDisplayName();
        $this->registerCss('dist/frontend/module/user/css/profile.css');
        return view('User::frontend.profile.profile',$data);
    }

    public function alLReviews(Request $request,$id){
        $user = User::find($id);
        if(empty($user)){
            abort(404);
        }
        $data['user'] = $user;
        $data['page_title'] = __(':name - reviews from guests',['name'=>$user->getDisplayName()]);
        $data['breadcrumbs'] = [
            ['name'=>$user->getDisplayName(),'url'=>route('user.profile',['id'=>$id])],
            ['name'=>__('Reviews from guests'),'url'=>''],
        ];
        $this->registerCss('dist/frontend/module/user/css/profile.css');
        return view('User::frontend.profile.all-reviews',$data);
    }
    public function allServices(Request $request,$id){
        $all = get_bookable_services();
        $type = $request->query('type');
        if(empty($type) or !array_key_exists($type,$all))
        {
            abort(404);
        }
        $moduleClass = $all[$type];
        $user = User::find($id);
        if(empty($user)){
            abort(404);
        }
        $data['user'] = $user;
        $data['page_title'] = __(':name - :type',['name'=>$user->getDisplayName(),'type'=>$moduleClass::getModelName()]);
        $data['breadcrumbs'] = [
            ['name'=>$user->getDisplayName(),'url'=>route('user.profile',['id'=>$id])],
            ['name'=>__(':type by :first_name',['type'=>$moduleClass::getModelName(),'first_name'=>$user->first_name]),'url'=>''],
        ];
        $data['type'] = $type;
        $this->registerCss('dist/frontend/module/user/css/profile.css');
        return view('User::frontend.profile.all-services',$data);
    }
}