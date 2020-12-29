<?php

namespace Modules\Sauna\Models;

use App\BaseModel;

class SaunaTranslation extends Sauna
{
    protected $table = 'bravo_sauna_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
    ];

    protected $slugField     = false;
    protected $seo_type = 'sauna_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
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
