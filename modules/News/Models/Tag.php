<?php
namespace Modules\News\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class Tag extends BaseModel
{
    use SoftDeletes;
    protected $table = 'core_tags';
    protected $fillable      = [
        'name',
        'content',
        'slug'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';
    protected $seo_type = 'news_tags';

    public static function getModelName()
    {
        return __("New Tag");
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'name');
        if ($q) {
            $query->where('name', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public static function saveTagByName($tag_name)
    {
        $ids = [];
        if (!empty($tag_name)) {
            foreach ($tag_name as $name) {
                $find = parent::where('name', trim($name))->first();
                if (empty($find)) {
                    $tag = new self();
                    $tag->name = $name;
                    $tag->save();
                    $ids[] = $tag->id;
                } else {
                    $ids[] = $find->id;
                }
            }
        }
        return $ids;
    }

    public function getDetailUrl($locale = false)
    {
        return route('news.tag.index',['slug'=>$this->slug]);
    }
}
