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
use Modules\Core\Models\Inbox;
use Modules\Core\Models\InboxMessage;
use Modules\Core\Models\Notification;

class InboxController extends Controller
{
    public function initChat(Request $request){

        $request->validate([
            'service_id'=>'required',
            'service_type'=>'required'
        ]);

        $service_type = $request->input('service_type');
        $service_id = $request->input('service_id');

        $allServices = get_bookable_services();
        if (empty($allServices[$service_type])) {
            return $this->sendError(__('Service type not found'));
        }

        $module = $allServices[$service_type];
        $service = $module::find($service_id);
        if (empty($service) or !is_subclass_of($service, '\\Modules\\Booking\\Models\\Bookable')) {
            return $this->sendError(__('Service not found'));
        }

        if($service->create_user == Auth::id()){
            return $this->sendError(__("You can not send message to yourself"));
        }

        $inbox = Inbox::query()->where(
            [
                'from_user'=>Auth::id(),
                'to_user'=>$service->create_user
            ]
        )->first();


        if(!empty($inbox))
        {
            if($inbox->object_id != $service_id and $inbox->object_model != $service_type){
                $inbox->object_id = $service_id;
                $inbox->object_model = $service_type;
                $inbox->save();
            }

        }else{
            $inbox = new Inbox();
            $inbox->fillByAttr(['from_user','to_user','object_id','object_model'],[
                'from_user'=>Auth::id(),
                'to_user'=>$service->create_user,
                'object_id'=>$service_id,
                'object_model'=>$service_type,
            ]);
            $inbox->save();
        }

        return $this->sendSuccess($inbox->jsData());
    }

    public function send(Request $request){

        $request->validate([
            'content'=>'required|max:2000',
            'inbox_id'=>'required'
        ]);

        $inbox = Inbox::find($request->input('inbox_id'));

        if(empty($inbox) or !in_array(Auth::id(),[$inbox->from_user,$inbox->to_user]))
        {
            return $this->sendError(__("Conversation does not exists"));
        }

        $message = new InboxMessage();

        $message->fillByAttr(['from_user','to_user','content','inbox_id'],[
            'content'=>strip_tags(trim($request->input('content'))),
            'from_user'=> Auth::id() == $inbox->from_user ? $inbox->from_user : $inbox->to_user,
            'to_user'=> Auth::id() == $inbox->from_user ? $inbox->to_user : $inbox->from_user,
            'inbox_id'=>$request->input('inbox_id')
        ]);

        $message->save();

        return $this->sendSuccess([
            'row'=>$message->jsData()
        ]);

    }
    public function reload(Request $request){

        $request->validate([
            'inbox_id'=>'required',
        ]);

        $inbox = Inbox::find($request->input('inbox_id'));

        if(empty($inbox) or !in_array(Auth::id(),[$inbox->from_user,$inbox->to_user]))
        {
            return $this->sendError(__("Conversation does not exists"));
        }

        $q = InboxMessage::query()->where([
            'inbox_id'=>$request->input('inbox_id')
        ])->orderBy('id','desc');

        if($request->input('last_id')){
            $q->where('id','<',$request->input('last_id'));
        }
        if($request->input('offset')){
            $q->offset($request->input('offset'));
        }
        $rows = $q->take(20)->get();

        $messages = [];

        if(!empty($rows))
        {
            foreach ($rows as $row)
            {
                $messages[] = $row->jsData();
            }
        }

        return $this->sendSuccess([
            'messages'=>$messages
        ]);

    }

    public function notifications(Request $request)
    {
        $rows = Inbox::getUnreadConversations($request->input('initial'),$request->input('ids'));
        $unread_conversations = [];
        if(!empty($rows)){
            foreach ($rows as $row){
                $unread_conversations[] = $row->jsData($request->input('initial'));
            }
        }

        $data = [
            'unread_count'=>Notification::query()->where([
                'to_user'=>Auth::id(),
                'type_group'=>"inbox",
                'is_read'=>0
            ])->count('id'),
            'unread_conversations'=>$unread_conversations
        ];

        if($inbox_id = $request->input('inbox_id')){
            $inbox = Inbox::find($inbox_id);
            if(!empty($inbox) and in_array(Auth::id(),[$inbox->from_user,$inbox->to_user])){


                $q = InboxMessage::query()->where([
                    'inbox_id'=>$request->input('inbox_id'),
                ])->orderBy('id','desc');

                if(!$request->input('initial')){
                    $q->where('is_read',0);
                    $q->where('to_user',Auth::id());
                }

                $rows = $q->take(20)->get();

                $messages = [];

                if(!empty($rows))
                {
                    foreach ($rows as $row)
                    {
                        $messages[] = $row->jsData();
                    }
                }

                if($request->input('initial')){
                    $jsData = $inbox->jsData();
                    $data['inbox'] =  $jsData;
                }
                $data['messages'] = $messages;
            }
        }

        return $this->sendSuccess($data);
    }

    public function markRead(Request $request){

        $ids_str = $request->input('ids');
        $ids = explode(',',$ids_str);

        if(!empty($ids) and is_array($ids))
        {
            Notification::query()->whereIn('target_id',$ids)->where([
                'to_user'=>Auth::id(),
                'type_group'=>'inbox'
            ])->update([
                'is_read'=>1
            ]);
            InboxMessage::query()->whereIn('id',$ids)->where([
                'to_user'=>Auth::id(),
            ])->update([
                'is_read'=>1
            ]);
        }
    }

}
