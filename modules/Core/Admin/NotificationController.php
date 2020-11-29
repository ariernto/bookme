<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/13/2019
 * Time: 10:19 PM
 */
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\NotificationPush;

class NotificationController extends AdminController
{
    public function markAsRead(Request $request){
        $id = $request->get('id');
        if(!empty($id))
        {
            NotificationPush::query()->where('id', $id)->update([
                'read_at' => now()
            ]);
        }
        return response()->json([], 200);
    }

    public function markAllAsRead(Request $request){
        $notify = NotificationPush::query();
        if(is_admin()){
            $notify->where(function($q){
                $q->where('data', 'LIKE', '%"for_admin":1%');
                $q->orWhere('notifiable_id', Auth::id());
            });
        }else{
            $notify->where('data', 'LIKE', '%"for_admin":0%');
            $notify->where('notifiable_id', Auth::id());
        }
        $notify->where('read_at', null)
            ->update([
                'read_at' => now()
            ]);
        return response()->json([], 200);
    }

    public function loadNotify(Request $request)
    {
        $type = $request->get('type', '');
        $query  = \Modules\Core\Models\NotificationPush::query();

        $query->where(function($q){
            $q->where('data', 'LIKE', '%"for_admin":1%');
            $q->orWhere('notifiable_id', Auth::id());
        });

        if($type == 'unread'){
            $query->where('read_at', null);
        }

        if($type == 'read'){
            $query->where('read_at', '!=', null);
        }

        $query->orderBy('created_at','desc');
        $data = [
            'rows'                  => $query->paginate(20),
            'page_title'            => __("All Notifications"),
            'type'                  => $type
        ];
        return view('Core::admin.notification.index', $data);
    }
}
