<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\News\Models;

use App\BaseModel;

class TagTranslation extends BaseModel
{
    protected $table = 'core_tag_translations';
    protected $fillable = ['name', 'content','image_id'];
    protected $seo_type = 'tag_translation';
    protected $cleanFields = [
        'content'
    ];
}