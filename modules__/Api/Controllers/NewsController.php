<?php
namespace Modules\Api\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;

class NewsController extends Controller
{

    public function search(Request $request){
        $model_News = News::query()->select("core_news.*");
        $model_News->where("core_news.status", "publish")->orderBy('core_news.id', 'desc');
        if (!empty($search = $request->query("s"))) {
            $model_News->where(function($query) use ($search) {
                $query->where('core_news.title', 'LIKE', '%' . $search . '%');
                $query->orWhere('core_news.content', 'LIKE', '%' . $search . '%');
            });

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app_get_locale() ){
                $model_News->leftJoin('core_news_translations', function ($join) use ($search) {
                    $join->on('core_news.id', '=', 'core_news_translations.origin_id');
                });
                $model_News->orWhere(function($query) use ($search) {
                    $query->where('core_news_translations.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('core_news_translations.content', 'LIKE', '%' . $search . '%');
                });
            }
        }
        if($cat_id = $request->query('cat_id')){
            $model_News->where('cat_id',$cat_id);
        }
        $rows = $model_News->with("getAuthor")->with('translations')->with("getCategory")->paginate(10);
        $total = $rows->total();
        return $this->sendSuccess(
            [
                'total'=>$total,
                'total_pages'=>$rows->lastPage(),
                'data'=>$rows->map(function($row){
                    return $row->dataForApi();
                }),
            ]
        );
    }
    public function category(Request $request){
        $model_News = NewsCategory::query()->select("core_news_category.*");
        $model_News->where("core_news_category.status", "publish");
        if (!empty($search = $request->query("s"))) {
            $model_News->where(function($query) use ($search) {
                $query->where('core_news_category.name', 'LIKE', '%' . $search . '%');
            });

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app_get_locale() ){
                $model_News->leftJoin('core_news_category_translations', function ($join) use ($search) {
                    $join->on('core_news_category.id', '=', 'core_news_category_translations.origin_id');
                });
                $model_News->orWhere(function($query) use ($search) {
                    $query->where('core_news_category_translations.title', 'LIKE', '%' . $search . '%');
                });
            }
        }
        $rows = $model_News->with('translations')->get()->toTree();
        return $this->sendSuccess(
            [
                'data'=>$rows->map(function($row){
                    return $row->dataForApi();
                }),
            ]
        );
    }

    public function detail($id = '')
    {
        $row = News::find($id);
        if(empty($row)){
            return $this->sendError(__("News not found"));
        }
        return $this->sendSuccess([
            'data'=>$row->dataForApi(true)
        ]);
    }
}
