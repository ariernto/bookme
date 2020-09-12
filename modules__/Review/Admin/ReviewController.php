<?php
namespace Modules\Review\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\AdminController;
use Modules\Review\Models\Review;

class ReviewController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/review');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission("review_manage_others");
        $model = Review::query();
        $model->orderBy('id', 'desc');
        if (!empty($author = $request->input('customer_id'))) {
            $model->where('create_user', $author);
        }
        $allServices = get_bookable_services();
        $allServicesKeys = array_keys($allServices);

        if (!empty($search_name = $request->input('s'))) {
            $search_name = "%".$search_name."%";
            $model->whereRaw(" ( title LIKE ? OR author_ip LIKE ? OR content LIKE ? ) ",[$search_name,$search_name,$search_name]);
            $model->orderBy('title', 'asc');
        }
        if (!empty($status = $request->input('status'))) {
            $model->where('status', $status);
        }
        if (!empty($service_type = $request->input('service'))) {
            $model->where('object_model', $service_type);
        }
        if (!empty($service_id = $request->input('service_id'))) {
            $model->where('object_id', $service_id);
        }
        if (!empty($object_model = $request->input('object_model')) and in_array($object_model,$allServicesKeys)) {
            $model->where('object_model', $object_model );
        }
        $model->whereIn('object_model', $allServicesKeys );
        $data = [
            'rows'        => $model->paginate(10),
            'breadcrumbs' => [
                ['name'  => __('Review'),
                 'class' => 'active'
                ],
            ]
        ];
        return view('Review::admin.index', $data);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission("review_manage_others");
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        $allServices = get_bookable_services();
        if ($action == "delete") {
            foreach ($ids as $id) {
                $review = Review::where('id', $id)->first();
                if(!empty($review)){
                    $review->delete();
                    $review->save();
                    $module_class = $allServices[$review->object_model] ?? false;
                    if(!empty($module_class)){
                        $model_serivce = $module_class::withTrashed()->find($review->object_id);
                        if(!empty($model_serivce)){
                            Cache::forget('review_' . $model_serivce->type . '_' . $review->object_id);
                            $model_serivce->update_service_rate();
                        }
                    }
                }
            }
        } else {
            foreach ($ids as $id) {
                $review = Review::where('id', $id)->first();
                $review->status = $action;
                $review->save();
                $module_class = $allServices[$review->object_model] ?? false;
                if(!empty($module_class)){
                    $model_serivce = $module_class::withTrashed()->find($review->object_id);
                    if(!empty($model_serivce)){
                        Cache::forget('review_' . $model_serivce->type . '_' . $review->object_id);
                        $model_serivce->update_service_rate();
                    }
                }
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }
}
