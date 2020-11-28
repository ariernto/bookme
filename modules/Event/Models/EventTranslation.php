<?php

namespace Modules\Event\Models;

use App\BaseModel;

class EventTranslation extends Event
{
    protected $table = 'bravo_event_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
        'surrounding'
    ];

    protected $slugField     = false;
    protected $seo_type = 'event_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
        'surrounding'  => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }

    public static function boot() {
		parent::boot();
		static::saving(function($table)  {
			unset($table->extra_price);
			unset($table->price);
			unset($table->sale_price);
		});
	}
}
