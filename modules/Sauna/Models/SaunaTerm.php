<?php
namespace Modules\Sauna\Models;

use App\BaseModel;

class SaunaTerm extends BaseModel
{
    protected $table = 'bravo_sauna_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}
