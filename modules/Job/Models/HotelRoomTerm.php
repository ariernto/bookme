<?php
namespace Modules\Job\Models;

use App\BaseModel;

class HotelRoomTerm extends BaseModel
{
    protected $table = 'bravo_hotel_room_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}