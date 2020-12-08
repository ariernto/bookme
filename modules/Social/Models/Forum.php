<?php
namespace Modules\Social\Models;
use App\BaseModel;

class Forum extends BaseModel
{
    protected $table = 'social_forums';
    protected $slugFromField = 'name';
    protected $slugField = 'slug';

    protected $fillable = [
        'name',
        'icon'
    ];

    public function getDetailUrl()
    {
        return route('social.forum',['slug'=>$this->slug]);
    }

    public function getIconHtmlAttribute(){
        if($this->icon_image){
            return sprintf("<img src='%s' class='bravo-icon-img' alt='%s'>",get_image_tag($this->icon_image,'thumb'),e($this->name));
        }else{
            return sprintf("<i class='%s bravo-icon'></i>",$this->icon);
        }
    }
}
