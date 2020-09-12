<?php
namespace Modules\News\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Language\Models\Language;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\News;
use Modules\News\Models\NewsTranslation;

class NewsController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/news');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('news_view');
        $dataNews = News::query()->orderBy('id', 'desc');
        $post_name = $request->query('s');
        $cate = $request->query('cate_id');
        if ($cate) {
           $dataNews->where('cat_id', $cate);
        }
        if ($post_name) {
            $dataNews->where('title', 'LIKE', '%' . $post_name . '%');
            $dataNews->orderBy('title', 'asc');
        }


        $this->filterLang($dataNews);

        $data = [
            'rows'        => $dataNews->with("getAuthor")->with("getCategory")->paginate(20),
            'categories'  => NewsCategory::get(),
            'breadcrumbs' => [
                [
                    'name' => __('News'),
                    'url'  => 'admin/module/news'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            "languages"=>Language::getActive(false),
            "locale"=>\App::getLocale(),
            'page_title'=>__("News Management")
        ];
        return view('News::admin.news.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('news_create');
        $row = new News();
        $row->fill([
            'status' => 'publish',
        ]);
        $data = [
            'categories'        => NewsCategory::get()->toTree(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('News'),
                    'url'  => 'admin/module/news'
                ],
                [
                    'name'  => __('Add News'),
                    'class' => 'active'
                ],
            ],
            'translation'=>new NewsTranslation()
        ];
        return view('News::admin.news.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('news_update');

        $row = News::find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));

        if (empty($row)) {
            return redirect('admin/module/news');
        }

        $data = [
            'row'  => $row,
            'translation'  => $translation,
            'categories' => NewsCategory::get()->toTree(),
            'tags' => $row->getTags(),
            'enable_multi_lang'=>true
        ];
        return view('News::admin.news.detail', $data);
    }

    public function store(Request $request, $id){
        if($id>0){
            $this->checkPermission('news_update');
            $row = News::find($id);
            if (empty($row)) {
                return redirect(route('news.admin.index'));
            }
        }else{
            $this->checkPermission('news_create');
            $row = new News();
            $row->status = "publish";
        }

        $row->fill($request->input());
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }
        $res = $row->saveOriginOrTranslation($request->query('lang'),true);

        if ($res) {
            if(is_default_lang($request->query('lang'))){
                $row->saveTag($request->input('tag_name'), $request->input('tag_ids'));
            }
            if($id > 0 ){
                return back()->with('success',  __('News updated') );
            }else{
                return redirect(route('news.admin.edit',$row->id))->with('success', __('News created') );
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('news_update');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = News::where("id", $id);
                if (!$this->hasPermission('news_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('news_delete');
                }
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = News::where("id", $id);
                if (!$this->hasPermission('news_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('news_update');
                }
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function trans($id,$locale){
        $row = News::find($id);

        if(empty($row)){
            return redirect()->back()->with("danger",__("News does not exists"));
        }

        $translated = News::query()->where('origin_id',$id)->where('lang',$locale)->first();
        if(!empty($translated)){
            redirect($translated->getEditUrl());
        }

        $language = Language::where('locale',$locale)->first();
        if(empty($language)){
            return redirect()->back()->with("danger",__("Language does not exists"));
        }

        $new = $row->replicate();

        if(!$row->origin_id){
            $new->origin_id = $row->id;
        }

        $new->lang = $locale;

        $new->save();


        return redirect($new->getEditUrl());
    }
}
