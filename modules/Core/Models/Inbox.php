<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/9/2019
 * Time: 11:56 PM
 */
namespace Modules\Core\Models;

use App\BaseModel;
use App\User;
use function Clue\StreamFilter\fun;
use Illuminate\Support\Facades\Auth;

class Inbox extends BaseModel
{
    protected $table  = 'core_inbox';

    protected $fillable = [
        'from_user',
        'to_user',
        'object_id',
        'object_model',
    ];
    public function to_user_object(){
        return $this->hasOne(User::class,'id','to_user')->withDefault();
    }

    public function from_user_object(){
        return $this->hasOne(User::class,'id','from_user')->withDefault();
    }

    public function last_message(){
        return $this->hasOne(InboxMessage::class,'inbox_id')->orderBy('id','desc')->withDefault();
    }
    public function getLastUpdatedTextAttribute(){
        return human_time_diff_short(strtotime($this->created_at));
    }

    public function getUnreadCountAttribute(){
        return Notification::query()->where([
            'to_user'=>Auth::id(),
            'type_group'=>"inbox",
            'is_read'=>0,
            'target_parent_id'=>$this->id
        ])->count('id');
    }

    public function jsData($initial = false){
        $to_user = $this->to_user_object;
        $from_user = $this->from_user_object;
        $last_message = $this->last_message;

        $messages = [];
        if($initial){

            $q = InboxMessage::query()->where([
                'inbox_id'=>$this->id,
            ])->orderBy('id','desc');
            $rows = $q->take(20)->get();
            if(!empty($rows))
            {
                foreach ($rows as $row){
                    $messages[] = $row->jsData();
                }
            }
        }

        return [
            'id'=>$this->id,
            'display_name'=>Auth::id() != $this->to_user ? $to_user->getDisplayName(true) : $from_user->getDisplayName(true),
            'avatar_url'=> Auth::id() != $this->to_user ? $to_user->getAvatarUrl(): $from_user->getAvatarUrl(),
            'last_message' => $last_message->jsData(),
            'last_updated_text'=>$last_message['last_updated_text'] ? $last_message['last_updated_text'] : $this->last_updated_text,
            'last_updated'=>$last_message['created_at'] ? $last_message['created_at'] : strtotime($this->created_at),
            'messages'=> $messages,
            'unread_count'=>$this->unread_count,
            'total'=>InboxMessage::query()->where([
                'inbox_id'=>$this->id
            ])->count('id')
        ];
    }

    public static function getUnreadConversations($initial = false,$ids_str = ''){

        $user_id = Auth::id();

        $query = parent::query();

        $rows = $query->select(['core_inbox.*'])
            ->join('core_inbox_messages as m','core_inbox.id','=','m.inbox_id')
            ->where("m.to_user",$user_id)
            ->take(100)
            ->groupBy('core_inbox.id');
        if(!$initial)
        {
            $rows->where(function($query) use ($ids_str){
                $query->where("m.is_read",0);
                if(!empty($ids_str)){
                    $ids = explode(',',$ids_str);
                    if(!empty($ids)){
                        $query->orWhereIn("core_inbox.id",$ids);
                    }
                }

            });
        }

        $rows = $rows->take(20)->with(['last_message','from_user_object','to_user_object'])->get();

        return $rows;
    }

}
