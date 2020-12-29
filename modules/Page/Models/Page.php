<?php
namespace Modules\Page\Models;

use App\BaseModel;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class Page extends BaseModel
{
    use SoftDeletes;

    protected $table = 'core_pages';
    protected $fillable = [
        'title',
        'content',
        'status',
        'short_desc',
        'image_id',
        'template_id'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'title';
    protected $cleanFields = [
        'content',
    ];

    public $translatedAttributes = [
        'title',
        'content',
        'short_desc',
    ];

    protected $seo_type = 'page';

    public function getDetailUrl($locale = false)
    {
        return route('page.detail',['slug'=>$this->slug]);
    }

    public static function getModelName()
    {
        return __("Page");
    }

    public static function getAsMenuItem($id)
    {
        return parent::select('id', 'title as name')->find($id);
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'title as name');
        if (strlen($q)) {

            $query->where('title', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public function getEditUrlAttribute()
    {
        return url('admin/module/page/edit/' . $this->id);
    }

    public function template()
    {
        return $this->hasOne("\\Modules\\Template\\Models\\Template", 'id', 'template_id');
    }

    public function getProcessedContent()
    {
        $template = $this->template;
        if(!empty($template)){
            $translation = $template->translateOrOrigin(app()->getLocale());
            return $translation->getProcessedContent();
        }
    }

}
