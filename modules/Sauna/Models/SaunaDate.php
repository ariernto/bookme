<?php
namespace Modules\Sauna\Models;

use App\BaseModel;

class SaunaDate extends BaseModel
{
    protected $table = 'bravo_sauna_dates';

    protected $casts = [
        'ticket_types'=>'array',
    ];

    public static function getDatesInRanges($start_date,$end_date,$id){
        return static::query()->where([
            ['start_date','>=',$start_date],
            ['end_date','<=',$end_date],
            ['target_id','=',$id],
        ])->take(100)->get();
    }
}
