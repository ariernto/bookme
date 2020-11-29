<?php
namespace Modules\Activity\Models;

use App\BaseModel;

class ActivityCategoryTranslation extends BaseModel
{
    protected $table = 'bravo_activity_category_translations';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $cleanFields = [
        'content'
    ];
}