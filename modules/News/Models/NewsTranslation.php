<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\News\Models;

use App\BaseModel;

class NewsTranslation extends BaseModel
{
    protected $table = 'core_news_translations';
    protected $fillable = ['title', 'content'];
    protected $seo_type = 'news_translation';
    protected $cleanFields = [
        'content'
    ];
}