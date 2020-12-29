<?php

namespace Modules\Car\Models;

use App\BaseModel;

class CarTranslation extends Car
{
    protected $table = 'bravo_car_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
    ];

    protected $slugField     = false;
    protected $seo_type = 'car_translation';

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