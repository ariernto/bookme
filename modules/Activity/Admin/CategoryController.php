<?php
namespace Modules\Activity\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Activity\Models\ActivityCategory;
use Modules\Activity\Models\ActivityCategoryTranslation;

class CategoryController extends AdminController
{
    protected $activityCategoryClass;
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/activity');
        $this->activityCategoryClass = ActivityCategory::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('activity_manage_others');
        $listCategory = $this->activityCategoryClass::query();
        if (!empty($search = $request->query('s'))) {
            $listCategory->where('name', 'LIKE', '%' . $search . '%');
        }
        $listCategory->orderBy('created_at', 'desc');
        $data = [
            'rows'        => $listCategory->get()->toTree(),
            'row'         => new $this->activityCategoryClass(),
            'translation'    => new ActivityCategoryTranslation(),
            'breadcrumbs' => [
                [
                    'name' => __('Activity'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('Category'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.category.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('activity_manage_others');
        $row = $this->activityCategoryClass::find($id);
        if (empty($row)) {
            return redirect(route('activity.admin.category.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'row'         => $row,
            'parents'     => $this->activityCategoryClass::get()->toTree(),
            'breadcrumbs' => [
                [
                    'name' => __('Activity'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('Category'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.category.detail', $data);
    }

    public function store(Request $request , $id)
    {
        $this->checkPermission('activity_manage_others');
        $this->validate($request, [
            'name' => 'required'
        ]);
        if($id>0){
            $row = $this->activityCategoryClass::find($id);
            if (empty($row)) {
                return redirect(route('activity.admin.category.index'));
            }
        }else{
            $row = new $this->activityCategoryClass();
            $row->status = "publish";
        }

        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            return back()->with('success',  __('Category saved') );
        }
    }

    public function editBulk(Request $request)
    {
        $this->checkPermission('activity_manage_others');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Select an Action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = $this->activityCategoryClass::where("id", $id)->first();
                if(!empty($query)){
                    //Sync child category
                    $list_childs = $this->activityCategoryClass::where("parent_id", $id)->get();
                    if(!empty($list_childs)){
                        foreach ($list_childs as $child){
                            $child->parent_id = null;
                            $child->save();
                        }
                    }
                    //Del parent category
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = $this->activityCategoryClass::where("id", $id);
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Updated success!'));
    }

    public function getForSelect2(Request $request)
    {
        $pre_selected = $request->query('pre_selected');
        $selected = $request->query('selected');

        if($pre_selected && $selected){
            $item = $this->activityCategoryClass::find($selected);
            if(empty($item)){
                return response()->json([
                    'text'=>''
                ]);
            }else{
                return response()->json([
                    'text'=>$item->name
                ]);
            }
        }
        $q = $request->query('q');
        $query = $this->activityCategoryClass::select('id', 'name as text')->where("status","publish");
        if ($q) {
            $query->where('name', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }
}
