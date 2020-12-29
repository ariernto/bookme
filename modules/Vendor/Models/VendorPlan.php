<?php
namespace Modules\Vendor\Models;

use App\BaseModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class VendorPlan extends BaseModel
{
    use SoftDeletes;
    protected $table = 'core_vendor_plans';
    protected $fillable = [
        'name',
        'base_commission',
        'status',
    ];

    public static function getModelName()
    {
        return __("Vendor Plans");
    }

    public static function getAsMenuItem($id)
    {
        return parent::select('id', 'name')->find($id);
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
    public function meta(){
        return $this->hasMany(VendorPlanMeta::class);
    }

    public function getEditUrlAttribute()
    {
        return url('admin/module/vendor-plan/edit/' . $this->id);
    }
}
