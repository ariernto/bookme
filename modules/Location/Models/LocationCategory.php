<?php
namespace Modules\Location\Models;

use App\BaseModel;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationCategory extends BaseModel
{
    use SoftDeletes;
    use NodeTrait;
    protected $table = 'location_category';
    protected $fillable = [
        'name',
        'content',
        'slug',
        'icon_class',
        'status',
        'parent_id'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';

    public static function getModelName()
    {
        return __("Location Category");
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'name');
        if (strlen($q)) {
            $query->where('name', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }
    public function getDetailUrl(){
        return url(app_get_locale(false, false, '/') . config('tour.tour_route_prefix').'?cat_id[]='.$this->id);
    }

    public function dataForApi(){
        $translation = $this->translateOrOrigin(app()->getLocale());
        return [
            'id'=>$this->id,
            'name'=>$translation->name,
            'slug'=>$this->slug,
        ];
    }
    public function translations(){
        return $this->hasOne(LocationCategoryTranslation::class,'origin_id')->where('locale',app()->getLocale());
    }
}
