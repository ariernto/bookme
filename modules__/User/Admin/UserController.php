<?php
namespace Modules\User\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\AdminController;
use Modules\User\Events\VendorApproved;
use Modules\Vendor\Models\VendorRequest;
use Spatie\Permission\Models\Role;

class UserController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/user');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('user_view');
        $username = $request->query('s');
        $listUser = User::query()->orderBy('id','desc');
        if (!empty($username)) {
             $listUser->where(function($query) use($username){
                 $query->where('first_name', 'LIKE', '%' . $username . '%');
                 $query->orWhere('id',  $username);
                 $query->orWhere('phone',  $username);
                 $query->orWhere('email', 'LIKE', '%' . $username . '%');
                 $query->orWhere('last_name', 'LIKE', '%' . $username . '%');
             });
        }
        if($request->query('role')){
            $listUser->role($request->query('role'));
        }
        $listUser->with(['wallet']);
        $data = [
            'rows' => $listUser->paginate(20),
            'roles' => Role::all()
        ];
        return view('User::admin.index', $data);
    }

    public function create(Request $request)
    {

        $row = new \Modules\User\Models\User();
        $data = [
            'row' => $row,
            'roles' => Role::all(),
            'breadcrumbs'=>[
                [
                    'name'=>__("Users"),
                    'url'=>'admin/module/user'
                ]
            ]
        ];
        return view('User::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = User::find($id);
        if (empty($row)) {
            return redirect('admin/module/user');
        }
        if ($row->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
            abort(403);
        }
        $data = [
            'row'   => $row,
            'roles' => Role::all(),
            'breadcrumbs'=>[
                [
                    'name'=>__("Users"),
                    'url'=>'admin/module/user'
                ],
                [
                    'name'=>__("Edit User: #:id",['id'=>$row->id]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('User::admin.detail', $data);
    }

    public function password(Request $request,$id){

        $row = User::find($id);
        $data  = [
            'row'=>$row,
            'currentUser'=>Auth::user()
        ];
        if (empty($row)) {
            return redirect('admin/module/user');
        }
        if ($row->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
            abort(403);
        }
        return view('User::admin.password',$data);
    }

    public function changepass(Request $request, $id)
    {
        if(is_demo_mode()){
            return redirect()->back()->with("error", __("DEMO MODE: You can not change password!"));
        }
        $rules = [];
        $urow = User::find($id);
        if ($urow->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
            abort(403);
        }
        $request->validate([
            'password'              => 'required|min:6|max:255',
            'password_confirmation' => 'required',
        ]);
        $password_confirmation = $request->input('password_confirmation');
        $password = $request->input('password');
        if ($password != $password_confirmation) {
            return redirect()->back()->with("error", __("Your New password does not matches. Please type again!"));
        }
        if ($urow->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
            if ($password) {
                if ($urow->id != Auth::user()->id) {
                    $rules['old_password'] = 'required';
                }
                $rules['password'] = 'required|string|min:6|confirmed';
            }
            $this->validate($request, $rules);
            if ($password) {
                if (!(Hash::check($request->input('old_password'), $urow->password))) {
                    // The Old passwords matches
                    return redirect()->back()->with("error", __("Your current password does not matches with the password you provided. Please try again."));
                }
            }
        }
        $urow->password = bcrypt($password);
        if ($urow->save()) {

            if ($request->input('role_id') and $role = Role::findById($request->input('role_id'))) {
                $urow->assignRole($role);
            }
            return redirect()->back()->with('success', __('Password updated!'));
        }
    }

    public function store(Request $request, $id)
    {
        if($id and $id>0){
            $this->checkPermission('user_update');
            $row = User::find($id);
            if(empty($row)){
                abort(404);
            }
            if ($row->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
                abort(403);
            }

            $request->validate([
                'first_name'              => 'required|max:255',
                'last_name'              => 'required|max:255',
                'status'              => 'required|max:50',
                'phone'              => 'required',
                'country'              => 'required',
                'role_id'              => 'required|max:11',
                'email'              =>[
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($row->id)
                ],
            ]);

        }else{
            $this->checkPermission('user_create');
            $check = Validator::make($request->input(),[
                'first_name'              => 'required|max:255',
                'last_name'              => 'required|max:255',
                'status'              => 'required|max:50',
                'phone'              => 'required',
                'country'              => 'required',
                'role_id'              => 'required|max:11',
                'email'              =>[
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')
                ],
            ]);

            if(!$check->validated()){
                return back()->withInput($request->input());
            }

            $row = new User();
            $row->email = $request->input('email');
        }

        $row->name = $request->input('name');
        $row->first_name = $request->input('first_name');
        $row->last_name = $request->input('last_name');
        $row->phone = $request->input('phone');
        $row->birthday = $request->input('birthday');
        $row->address = $request->input('address');
        $row->address2 = $request->input('address2');
        $row->bio = clean($request->input('bio'));
        $row->status = $request->input('status');
        $row->avatar_id = $request->input('avatar_id');
        $row->email = $request->input('email');
        $row->country = $request->input('country');
        $row->city = $request->input('city');
        $row->state = $request->input('state');
        $row->zip_code = $request->input('zip_code');
        $row->business_id = $request->input('business_id');
        $row->business_name = $request->input('business_name');
        $row->vendor_commission_type = $request->input('vendor_commission_type');
        $row->vendor_commission_amount = $request->input('vendor_commission_amount');

        //Block all service when user is block
        if($row->status == "blocked"){
            $services = get_bookable_services();
            if(!empty($services)){
                foreach ($services as $service){
                    $service::query()->where("create_user",$row->id)->update(['status' => "draft"]);
                }
            }
        }

        if ($row->save()) {

            if ($request->input('role_id') and $role = Role::findById($request->input('role_id'))) {
                $row->syncRoles($role);
            }

            $permissions = $request->input('vendor_permission');
            if (isset($permissions) && count($permissions) > 0) {
                if (in_array('tour', $permissions)) {
                    $row->givePermissionTo('tour_view');
                    $row->givePermissionTo('tour_create');
                    $row->givePermissionTo('tour_update');
                    $row->givePermissionTo('tour_delete');
                }
                else {
                    $row->revokePermissionTo('tour_view');
                    $row->revokePermissionTo('tour_create');
                    $row->revokePermissionTo('tour_update');
                    $row->revokePermissionTo('tour_delete');
                }
                if (in_array('space', $permissions)) {
                    $row->givePermissionTo('space_view');
                    $row->givePermissionTo('space_create');
                    $row->givePermissionTo('space_update');
                    $row->givePermissionTo('space_delete');
                }
                else {
                    $row->revokePermissionTo('space_view');
                    $row->revokePermissionTo('space_create');
                    $row->revokePermissionTo('space_update');
                    $row->revokePermissionTo('space_delete');
                }

                if (in_array('hotel', $permissions)) {
                    $row->givePermissionTo('hotel_view');
                    $row->givePermissionTo('hotel_create');
                    $row->givePermissionTo('hotel_update');
                    $row->givePermissionTo('hotel_delete');
                }
                else {
                    $row->revokePermissionTo('hotel_view');
                    $row->revokePermissionTo('hotel_create');
                    $row->revokePermissionTo('hotel_update');
                    $row->revokePermissionTo('hotel_delete');
                }
                if (in_array('car', $permissions)) {
                    $row->givePermissionTo('car_view');
                    $row->givePermissionTo('car_create');
                    $row->givePermissionTo('car_update');
                    $row->givePermissionTo('car_delete');
                }
                else {
                    $row->revokePermissionTo('car_view');
                    $row->revokePermissionTo('car_create');
                    $row->revokePermissionTo('car_update');
                    $row->revokePermissionTo('car_delete');
                }
                if (in_array('event', $permissions)) {
                    $row->givePermissionTo('event_view');
                    $row->givePermissionTo('event_create');
                    $row->givePermissionTo('event_update');
                    $row->givePermissionTo('event_delete');
                }
                else {
                    $row->revokePermissionTo('event_view');
                    $row->revokePermissionTo('event_create');
                    $row->revokePermissionTo('event_update');
                    $row->revokePermissionTo('event_delete');
                }
                if (in_array('activity', $permissions)) {
                    $row->givePermissionTo('activity_view');
                    $row->givePermissionTo('activity_create');
                    $row->givePermissionTo('activity_update');
                    $row->givePermissionTo('activity_delete');
                }
                else {
                    $row->revokePermissionTo('activity_view');
                    $row->revokePermissionTo('activity_create');
                    $row->revokePermissionTo('activity_update');
                    $row->revokePermissionTo('activity_delete');
                }
                if (in_array('accomodation', $permissions)) {
                    $row->givePermissionTo('accommodation_view');
                    $row->givePermissionTo('accommodation_create');
                    $row->givePermissionTo('accommodation_update');
                    $row->givePermissionTo('accommodation_delete');
                }
                else {
                    $row->revokePermissionTo('accommodation_view');
                    $row->revokePermissionTo('accommodation_create');
                    $row->revokePermissionTo('accommodation_update');
                    $row->revokePermissionTo('accommodation_delete');
                }
                if (in_array('boat', $permissions)) {
                    $row->givePermissionTo('boat_view');
                    $row->givePermissionTo('boat_create');
                    $row->givePermissionTo('boat_update');
                    $row->givePermissionTo('boat_delete');
                }
                else {
                    $row->revokePermissionTo('boat_view');
                    $row->revokePermissionTo('boat_create');
                    $row->revokePermissionTo('boat_update');
                    $row->revokePermissionTo('boat_delete');
                }
                if (in_array('sauna', $permissions)) {
                    $row->givePermissionTo('sauna_view');
                    $row->givePermissionTo('sauna_create');
                    $row->givePermissionTo('sauna_update');
                    $row->givePermissionTo('sauna_delete');
                }
                else {
                    $row->revokePermissionTo('sauna_view');
                    $row->revokePermissionTo('sauna_create');
                    $row->revokePermissionTo('sauna_update');
                    $row->revokePermissionTo('sauna_delete');
                }
            }

            return back()->with('success', ($id and $id>0) ? __('User updated'):__("User created"));
        }
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = User::select('*');
        if ($q) {
            $query->where(function ($query) use ($q) {
                $query->where('first_name', 'like', '%' . $q . '%')->orWhere('last_name', 'like', '%' . $q . '%')->orWhere('email', 'like', '%' . $q . '%')->orWhere('id', $q)->orWhere('phone', 'like', '%' . $q . '%');
            });
        }
        $res = $query->orderBy('id', 'desc')->orderBy('first_name', 'asc')->limit(20)->get();
        $data = [];
        if (!empty($res)) {
            if($request->query("user_type") == "vendor"){
                //for only vendor
                foreach ($res as $item) {
                    if($item->hasPermissionTo("dashboard_vendor_access")){
                        $data[] = [
                            'id'   => $item->id,
                            'text' => $item->getDisplayName() ? $item->getDisplayName() . ' (#' . $item->id . ')' : $item->email . ' (#' . $item->id . ')',
                        ];
                    }
                }
            }else{
                //for all
                foreach ($res as $item) {
                    $data[] = [
                        'id'   => $item->id,
                        'text' => $item->getDisplayName() ? $item->getDisplayName() . ' (#' . $item->id . ')' : $item->email . ' (#' . $item->id . ')',
                    ];
                }
            }
        }
        return response()->json([
            'results' => $data
        ]);
    }

    public function bulkEdit(Request $request)
    {
        if(is_demo_mode()){
            return redirect()->back()->with("error","DEMO MODE: You are not allowed to do it");
        }
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids))
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        if (empty($action))
            return redirect()->back()->with('error', __('Select an Action!'));
        if ($action == 'delete') {
            foreach ($ids as $id) {
                if($id == Auth::id()) continue;
                $query = User::where("id", $id)->first();
                if(!empty($query)){
                    $query->email.='_d';
                    $query->save();
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                User::where("id", $id)->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Updated successfully!'));
    }
    public function userUpgradeRequest(Request $request)
    {
        $this->checkPermission('user_view');
        $listUser = VendorRequest::query();
        $data = [
            'rows' => $listUser->with(['user','role','approvedBy'])->orderBy('id','desc')->paginate(20),
            'roles' => Role::all(),

        ];
        return view('User::admin.upgrade-user', $data);
    }
    public function userUpgradeRequestApproved(Request $request)
    {
        $this->checkPermission('user_create');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids))
            return redirect()->back()->with('error', __('Select at leas 1 item!'));
        if (empty($action))
            return redirect()->back()->with('error', __('Select an Action!'));

        switch ($action){
            case "delete":
                foreach ($ids as $id) {
                    $query = VendorRequest::find( $id)->first();
                    if(!empty($query)){
                        $query->delete();
                    }
                }
                return redirect()->back()->with('success', __('Deleted success!'));
                break;
            default:
                foreach ($ids as $id) {
                    $vendorRequest = VendorRequest::find( $id);
                    if(!empty($vendorRequest)){
                        $vendorRequest->update(['status' => $action,'approved_time'=>now(),'approved_by'=>Auth::id()]);
                        $user = User::find($vendorRequest->user_id);
                        if(!empty($user)){
                            $user->syncRoles($vendorRequest->role_request);
                        }
                        event(new VendorApproved($user,$vendorRequest));
                    }
                }
                return redirect()->back()->with('success', __('Updated successfully!'));
                break;
        }
    }
    public function userUpgradeRequestApprovedId(Request $request, $id)
    {
        $this->checkPermission('user_create');
        if (empty($id))
            return redirect()->back()->with('error', __('Select at least 1 item!'));

        $vendorRequest = VendorRequest::find( $id);
        if(!empty($vendorRequest)){
            $vendorRequest->update(['status' => 'approved','approved_time'=>now(),'approved_by'=>Auth::id()]);
            $user = User::find($vendorRequest->user_id);
            if(!empty($user)){
                $user->syncRoles($vendorRequest->role_request);
            }

            event(new VendorApproved($user,$vendorRequest));
        }
        return redirect()->back()->with('success', __('Updated successfully!'));
    }
}
