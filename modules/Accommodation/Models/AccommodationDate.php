<?php
namespace Modules\Accommodation\Models;

use App\BaseModel;

class AccommodationDate extends BaseModel
{
    protected $table = 'bravo_accommodation_dates';

    protected $casts = [
        'person_types'=>'array'
    ];

    public static function getDatesInRanges($start_date,$end_date,$target_id){
        return static::query()->where([
            ['start_date','>=',$start_date],
            ['end_date','<=',$end_date],
            ['target_id','=',$target_id],
        ])->take(100)->get();
    }
}