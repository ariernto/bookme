<?php
namespace Modules\Hotel\Models;

use App\BaseModel;

class HotelTerm extends BaseModel
{
    protected $table = 'bravo_hotel_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}