<?php
namespace Modules\Boat\Models;

use App\BaseModel;

class BoatTerm extends BaseModel
{
    protected $table = 'bravo_boat_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}