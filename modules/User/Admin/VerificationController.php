<?php
namespace Modules\User\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\AdminController;
//use Modules\Vendor\Models\VendorPlan;
use Modules\User\Events\AdminUpdateVerificationData;
use Modules\User\Events\VendorApproved;
use Modules\Vendor\Models\VendorRequest;
use Spatie\Permission\Models\Role;

class VerificationController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/user');
    }

    public function index(Request $request){

        $data = [];
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

        switch ($request->input('status')){
            case "pending":
                $listUser->whereIn('verify_submit_status',['new','partial']);
                break;
            case "approved":
                $listUser->whereIn('verify_submit_status',['completed']);
                break;
            default:
                $listUser->whereIn('verify_submit_status',['new','partial','completed']);
        }

        $data = [
            'rows' => $listUser->paginate(20),
            'roles' => Role::all()
        ];

        return view("User::admin.verification.index",$data);
    }

    public function detail(Request $request, $id)
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
                    'name'=>__("Verification Request"),
                    'url'=>'admin/module/user/verification'
                ],
                [
                    'name'=>__("Verify request: :email",['email'=>$row->email]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('User::admin.verification.detail', $data);
    }
    public function store(Request $request, $id)
    {
        $row = User::find($id);
        if (empty($row)) {
            return redirect()->back()->with("danger",__("User not found"));
        }
        if ($row->id != Auth::user()->id and !Auth::user()->hasPermissionTo('user_update')) {
            abort(403);
        }

        $fields = $row->verification_fields;
        if(empty($fields)){
            return redirect()->back()->with("danger",__("No verification field found"));
        }

        $verifiedFields = $request->input('fields');
        $full = true;

        foreach ($fields as $field)
        {
            if(in_array($field['id'],$verifiedFields)){
                $row->addMeta('is_verified_'.$field['id'],1);
            }else{
                $row->addMeta('is_verified_'.$field['id'],0);
                $full = false;
            }
        }

        if($full){
            $row->verify_submit_status = 'completed';
            $row->is_verified = 1;
        }else{
            $row->verify_submit_status = 'partial';
            $row->is_verified = 0;
        }

        $row->save();

        event(new AdminUpdateVerificationData($row,$full));

        return redirect()->back()->with("success",__("Updated"));
    }
}
