<?php

namespace Modules\Hotel\Models;

use App\BaseModel;

class HotelTranslation extends Hotel
{
    protected $table = 'bravo_hotel_translations';

    protected $fillable = [
        'title',
        'content',
        'address',
        'policy',
        'surrounding'
    ];

    protected $slugField     = false;
    protected $seo_type = 'hotel_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'policy'  => 'array',
        'surrounding' => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }
    public function getRecordRoot(){
        return $this->belongsTo(Hotel::class,'origin_id');
    }
}