<?php
namespace Modules\Hotel\Models;

use App\BaseModel;

class HotelRoomTerm extends BaseModel
{
    protected $table = 'bravo_hotel_room_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}