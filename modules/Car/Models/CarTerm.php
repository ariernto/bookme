<?php
namespace Modules\Car\Models;

use App\BaseModel;

class CarTerm extends BaseModel
{
    protected $table = 'bravo_car_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}