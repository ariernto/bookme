<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\Page\Models;

use App\BaseModel;

class PageTranslation extends BaseModel
{
    protected $table = 'core_page_translations';
    protected $fillable = ['title', 'content'];
    protected $seo_type = 'page_translation';
    protected $cleanFields = [
        'content'
    ];
}