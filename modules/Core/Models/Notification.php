<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/9/2019
 * Time: 11:56 PM
 */
namespace Modules\Core\Models;

use App\BaseModel;

class Notification extends BaseModel
{
    protected $table  = 'core_notifications';

    protected $fillable = [
        'from_user',
        'to_user',
        'type',
        'type_group',
        'is_read',
        'target_id',
        'params',
        'target_parent_id'
    ];

}