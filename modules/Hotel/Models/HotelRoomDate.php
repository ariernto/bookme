<?php
namespace Modules\Hotel\Models;

use App\BaseModel;

class HotelRoomDate extends BaseModel
{
    protected $table = 'bravo_hotel_room_dates';

    protected $casts = [
        'person_types'=>'array'
    ];

    public static function getDatesInRanges($start_date,$end_date){
        return static::query()->where([
            ['start_date','>=',$start_date],
            ['end_date','<=',$end_date],
        ])->take(100)->get();
    }
}