<?php
namespace Modules\Location\Models;

use App\BaseModel;

class LocationTranslation extends BaseModel
{
    protected $table = 'bravo_location_translations';
    protected $fillable = ['name', 'content','trip_ideas'];
    protected $seo_type = 'location_translation';
    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'trip_ideas'  => 'array',
    ];
}
