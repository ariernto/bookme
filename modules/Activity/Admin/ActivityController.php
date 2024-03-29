<?php
namespace Modules\Activity\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Activity\Models\ActivityTerm;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\ActivityCategory;
use Modules\Activity\Models\ActivityTranslation;
use Modules\Location\Models\Location;

class ActivityController extends AdminController
{
    protected $activityClass;
    protected $activityTranslationClass;
    protected $activityCategoryClass;
    protected $activityTermClass;
    protected $attributesClass;
    protected $locationClass;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/activity');
        $this->activityClass = Activity::class;
        $this->activityTranslationClass = ActivityTranslation::class;
        $this->activityCategoryClass = ActivityCategory::class;
        $this->activityTermClass = ActivityTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('activity_view');
        $query = $this->activityClass::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($activity_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $activity_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if ($this->hasPermission('activity_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['getAuthor','category_activity'])->paginate(20),
            'activity_categories'    => $this->activityCategoryClass::where('status', 'publish')->get()->toTree(),
            'activity_manage_others' => $this->hasPermission('activity_manage_others'),
            'page_title'=>__("Activity Management"),
            'breadcrumbs'        => [
                [
                    'name' => __('Activities'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('activity_view');
        $query = $this->activityClass::onlyTrashed() ;
        $query->orderBy('id', 'desc');
        if (!empty($activity_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $activity_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if ($this->hasPermission('activity_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['getAuthor','category_activity'])->paginate(20),
            'activity_categories'    => $this->activityCategoryClass::where('status', 'publish')->get()->toTree(),
            'activity_manage_others' => $this->hasPermission('activity_manage_others'),
            'page_title'=>__("Recovery Activity Management"),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Activities'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('activity_create');
        $row = new Activity();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'           => $row,
            'attributes'    => $this->attributesClass::where('service', 'activity')->get(),
            'activity_category' => $this->activityCategoryClass::where('status', 'publish')->get()->toTree(),
            'activity_location' => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'translation' => new $this->activityTranslationClass(),
            'breadcrumbs'   => [
                [
                    'name' => __('Activities'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('Add Activity'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('activity_update');
        $row = $this->activityClass::find($id);
        if (empty($row)) {
            return redirect('admin/module/activity');
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('activity_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect('admin/module/activity');
            }
        }
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            "selected_terms" => $row->activity_term->pluck('term_id'),
            'attributes'     => $this->attributesClass::where('service', 'activity')->get(),
            'activity_category'  => $this->activityCategoryClass::where('status', 'publish')->get()->toTree(),
            'activity_location'  => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Activities'),
                    'url'  => 'admin/module/activity'
                ],
                [
                    'name'  => __('Edit Activity'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Activity::admin.detail', $data);
    }

    public function store( Request $request, $id ){

        if($id>0){
            $this->checkPermission('activity_update');
            $row = $this->activityClass::find($id);
            if (empty($row)) {
                return redirect(route('activity.admin.index'));
            }
            if($row->create_user != Auth::id() and !$this->hasPermission('activity_manage_others'))
            {
                return redirect(route('space.admin.index'));
            }

        }else{
            $this->checkPermission('activity_create');
            $row = new $this->activityClass();
            $row->status = "publish";
        }
        $row->fill($request->input());
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }
	    $row->ical_import_url  = $request->ical_import_url;
	    $row->create_user = $request->input('create_user');
        $row->default_state = $request->input('default_state',1);
        $res = $row->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
                $row->saveMeta($request);
            }
            if($id > 0 ){
                return back()->with('success',  __('Activity updated') );
            }else{
                return redirect(route('activity.admin.edit',$row->id))->with('success', __('Activity created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->activityTermClass::where('activity_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->activityTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'activity_id' => $row->id
                ]);
            }
            $this->activityTermClass::where('activity_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function bulkEdit(Request $request)
    {

        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }

        switch ($action){
            case "delete":
                foreach ($ids as $id) {
                    $query = $this->activityClass::where("id", $id);
                    if (!$this->hasPermission('activity_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('activity_delete');
                    }
                    $query->first();
                    if(!empty($query)){
                        $query->delete();
                    }
                }
                return redirect()->back()->with('success', __('Deleted success!'));
                break;
            case "recovery":
                foreach ($ids as $id) {
                    $query = $this->activityClass::where("id", $id);
                    if (!$this->hasPermission('activity_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('activity_delete');
                    }
                    $query->first();
                    if(!empty($query)){
                        $query->restore();
                    }
                }
                return redirect()->back()->with('success', __('Recovery success!'));
                break;
            case "clone":
                $this->checkPermission('activity_create');
                foreach ($ids as $id) {
                    (new $this->activityClass())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->activityClass::where("id", $id);
                    if (!$this->hasPermission('activity_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('activity_update');
                    }
                    $query->update(['status' => $action]);
                }
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
    }
}
