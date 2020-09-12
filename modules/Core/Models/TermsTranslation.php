<?php
namespace Modules\Core\Models;

use App\BaseModel;

class TermsTranslation extends BaseModel
{
    protected $table = 'bravo_terms_translations';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $cleanFields = [
        'content'
    ];
}