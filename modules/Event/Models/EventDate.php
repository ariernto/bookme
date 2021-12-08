<?php
namespace Modules\Event\Models;

use App\BaseModel;

class EventDate extends BaseModel
{
    protected $table = 'bravo_event_dates';

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
