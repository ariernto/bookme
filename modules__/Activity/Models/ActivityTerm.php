<?php
namespace Modules\Activity\Models;

use App\BaseModel;

class ActivityTerm extends BaseModel
{
    protected $table = 'bravo_activity_term';
    protected $fillable = [
        'term_id',
        'activity_id'
    ];
}