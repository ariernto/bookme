<?php

namespace Modules\Space\Models;

use App\BaseModel;

class SpaceTranslation extends Space
{
    protected $table = 'bravo_space_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
        'extra_price'
    ];

    protected $slugField     = false;
    protected $seo_type = 'space_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
        'extra_price'  => 'array',
        'surrounding'  => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }

    public function getRecordRoot(){
        return $this->belongsTo(Space::class,'origin_id');

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