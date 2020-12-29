<?php
namespace Modules\Accommodation\Models;

use App\BaseModel;

class AccommodationTerm extends BaseModel
{
    protected $table = 'bravo_accommodation_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}