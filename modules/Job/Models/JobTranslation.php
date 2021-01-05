<?php

namespace Modules\Job\Models;

use App\BaseModel;

class JobTranslation extends Job
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
    protected $seo_type = 'job_translation';

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
        return $this->belongsTo(Job::class,'origin_id');
    }
}