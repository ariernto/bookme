<?php
namespace Modules\Tour\Models;

use App\BaseModel;

class TourCategoryTranslation extends BaseModel
{
    protected $table = 'bravo_tour_category_translations';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $cleanFields = [
        'content'
    ];
}