<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/13/2019
 * Time: 10:19 PM
 */
namespace Modules\Core\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Models\Notification;

class NotificationController extends Controller
{
    public function markRead(Request $request){
        $ids = $request->input('ids');
        if(!empty($ids) and is_array($ids))
        {
            Notification::query()->whereIn('id',$ids)->where('to_user',Auth::id())->update([
                'is_read'=>1
            ]);
        }
    }
}