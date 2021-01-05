<?php
namespace Modules\Vendor\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Vendor\Models\VendorPlan;
use Modules\Vendor\Models\VendorPlanMeta;

class PlanController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/vendor/plan');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $query = new VendorPlan;
        if (!empty($request->name)) {
            $query = VendorPlan::where('name', 'LIKE', '%' . $request->name . '%');
        }
        $plans = $query->orderBy('name', 'asc');
        $data = [
            'rows'        => $plans->with("getAuthor")->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => __('Vendor Plans'),
                    'url'  => 'admin/module/vendor/plan'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Vendor::admin.plan.index', $data);
    }

    public function create(Request $request)
    {
        if (!empty($request->input())) {
            $row = new VendorPlan($request->input());
            if ($row->save()) {
                if (!empty($request->services_options)) {
                    foreach ($request->services_options as $service) {
                        $row->meta()->save(new VendorPlanMeta($service));
                    }
                }
                return redirect('admin/module/vendor/plan')->with('success', __('Plan created'));
            }
        } else {
            $row = new VendorPlan();
            $row->fill([
                'status' => 'publish',
            ]);
        }
        $data = [
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Vendor Plans'),
                    'url'  => 'admin/module/vendor/plan'
                ],
                [
                    'name'  => __('Add Plan'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Vendor::admin.plan.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = VendorPlan::find($id);
        if (empty($row)) {
            return redirect('admin/module/vendor/plan');
        }
        if (!empty($request->input())) {
            $row->fill($request->input());
            if ($row->save()) {
                foreach ($request->services_options as $service) {
                    $meta = $row->meta()->where('post_type', $service['post_type'])->first();
                    if (empty($meta)) {
                        $meta = new VendorPlanMeta();
                        $meta->vendor_plan_id = $row->id;
                    }
                    $meta->post_type = $service['post_type'];
                    $meta->maximum_create = $service['maximum_create'] ?? 0;
                    $meta->commission = !empty($service['commission']) ? $service['commission'] : $row->base_commission;
                    $meta->enable = $service['enable'] ?? 0;
                    $meta->auto_publish = $service['auto_publish'] ?? 0;
                    $meta->save();
                }
                return redirect('admin/module/vendor/plan')->with('success', __('Vendor plan updated'));
            }
        }
        $data = [
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Vendor Plans'),
                    'url'  => 'admin/module/vendor/plan'
                ],
                [
                    'name'  => __('Edit Page'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Vendor::admin.plan.detail', $data);
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = VendorPlan::select('id', 'name as text');
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('No Action is selected!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = VendorPlan::where("id", $id);
                if (!$this->hasPermission('page_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('page_delete');
                }
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = VendorPlan::where("id", $id);
                if (!$this->hasPermission('page_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('page_update');
                }
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }
}
