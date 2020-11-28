<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\News\Models;

use App\BaseModel;

class NewsCategoryTranslation extends BaseModel
{
    protected $table = 'core_news_category_translations';
    protected $fillable = ['name', 'content'];
    protected $seo_type = 'news_cat_translation';
    protected $cleanFields = [
        'content'
    ];
}