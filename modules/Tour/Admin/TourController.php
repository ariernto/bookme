<?php
namespace Modules\Tour\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Tour\Models\TourTerm;
use Modules\Tour\Models\Tour;
use Modules\Tour\Models\TourCategory;
use Modules\Tour\Models\TourTranslation;
use Modules\Location\Models\Location;

class TourController extends AdminController
{
    protected $tourClass;
    protected $tourTranslationClass;
    protected $tourCategoryClass;
    protected $tourTermClass;
    protected $attributesClass;
    protected $locationClass;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/tour');
        $this->tourClass = Tour::class;
        $this->tourTranslationClass = TourTranslation::class;
        $this->tourCategoryClass = TourCategory::class;
        $this->tourTermClass = TourTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('tour_view');
        $query = $this->tourClass::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($tour_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $tour_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if ($this->hasPermission('tour_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['getAuthor','category_tour'])->paginate(20),
            'tour_categories'    => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_manage_others' => $this->hasPermission('tour_manage_others'),
            'page_title'=>__("Tour Management"),
            'breadcrumbs'        => [
                [
                    'name' => __('Tours'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('tour_view');
        $query = $this->tourClass::onlyTrashed() ;
        $query->orderBy('id', 'desc');
        if (!empty($tour_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $tour_name . '%');
            $query->orderBy('title', 'asc');
        }
        if (!empty($cate = $request->input('cate_id'))) {
            $query->where('category_id', $cate);
        }
        if ($this->hasPermission('tour_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['getAuthor','category_tour'])->paginate(20),
            'tour_categories'    => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_manage_others' => $this->hasPermission('tour_manage_others'),
            'page_title'=>__("Recovery Tour Management"),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Tours'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('tour_create');
        $row = new Tour();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'           => $row,
            'attributes'    => $this->attributesClass::where('service', 'tour')->get(),
            'tour_category' => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_location' => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'translation' => new $this->tourTranslationClass(),
            'breadcrumbs'   => [
                [
                    'name' => __('Tours'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name'  => __('Add Tour'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('tour_update');
        $row = $this->tourClass::find($id);
        if (empty($row)) {
            return redirect('admin/module/tour');
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('tour_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect('admin/module/tour');
            }
        }
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            "selected_terms" => $row->tour_term->pluck('term_id'),
            'attributes'     => $this->attributesClass::where('service', 'tour')->get(),
            'tour_category'  => $this->tourCategoryClass::where('status', 'publish')->get()->toTree(),
            'tour_location'  => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Tours'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name'  => __('Edit Tour'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.detail', $data);
    }

    public function store( Request $request, $id ){

        if($id>0){
            $this->checkPermission('tour_update');
            $row = $this->tourClass::find($id);
            if (empty($row)) {
                return redirect(route('tour.admin.index'));
            }
            if($row->create_user != Auth::id() and !$this->hasPermission('tour_manage_others'))
            {
                return redirect(route('space.admin.index'));
            }

        }else{
            $this->checkPermission('tour_create');
            $row = new $this->tourClass();
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
                return back()->with('success',  __('Tour updated') );
            }else{
                return redirect(route('tour.admin.edit',$row->id))->with('success', __('Tour created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->tourTermClass::where('tour_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->tourTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'tour_id' => $row->id
                ]);
            }
            $this->tourTermClass::where('tour_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
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
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_delete');
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
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_delete');
                    }
                    $query->first();
                    if(!empty($query)){
                        $query->restore();
                    }
                }
                return redirect()->back()->with('success', __('Recovery success!'));
                break;
            case "clone":
                $this->checkPermission('tour_create');
                foreach ($ids as $id) {
                    (new $this->tourClass())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->tourClass::where("id", $id);
                    if (!$this->hasPermission('tour_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('tour_update');
                    }
                    $query->update(['status' => $action]);
                }
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
    }
}
