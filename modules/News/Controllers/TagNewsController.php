<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
use Modules\News\Models\NewsTag;

class TagNewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, $slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        if (empty($tag)) {
            return redirect('/news');
        }
        $listNews = News::query();
        $listNews->select(['core_news.*'])->join('core_news_tag', 'core_news_tag.news_id', '=', 'core_news.id')
            ->where('core_news_tag.tag_id', $tag->id)
            ->where('core_news_tag.deleted_at', null)
            ->with(['getAuthor','translations'])->with("getCategory");

        $translation = $tag->translateOrOrigin(app()->getLocale());

        $data = [
            'rows'           => $listNews->paginate(5),
            'model_category' => NewsCategory::where("status", "publish"),
            'model_tag'      => Tag::query(),
            'model_news'     => News::where("status", "publish"),
            'breadcrumbs'    => [
                [
                    'name' => __('News'),
                    'url'  => route('news.index')
                ],
                [
                    'name'  => $translation->name,
                    'class' => 'active'
                ],
            ],
            'seo_meta'  => $tag->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'translation'=>$translation,
            'page_title'=>$translation->name ?? ''
        ];
        return view('News::frontend.index', $data);
    }
}