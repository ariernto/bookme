<?php

namespace Modules\User\Controllers;

use App\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Chatify\Http\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Modules\FrontendController;

class ChatController extends FrontendController
{

    public function index(){
        $this->setActiveMenu(route('user.chat'));

        return view("User::frontend.chat.index",[
            'page_title'=>__("Messages")
        ]);
    }
    public function iframe($id = null)
    {
        if(!setting_item('inbox_enable')) abort(404);

        // get current route
        $route = (in_array(request()->route()->getName(), ['user', config('chatify.path')]))
            ? 'user'
            : request()::route()->getName();

        // prepare id
        return view('Chatify::pages.app', [
            'id' => ($id == null) ? 0 : $route . '_' . $id,
            'route' => $route,
            'messengerColor' => Auth::user()->messenger_color,
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }

    public function search(Request $request)
    {
        $getRecords = null;
        $input = trim(filter_var($request['input'], FILTER_SANITIZE_STRING));
        $records = User::where(function($query) use ($input){
            $query->where('name', 'LIKE', "%{$input}%")
                ->orWhere("first_name",'LIKE', "%{$input}%")
                ->orWhere("email",'LIKE', "%{$input}%");
        });
        $user_id = $request->input('user_id');
        if($user_id){
            $records->where('id',$user_id);
        }
        foreach ($records->get() as $record) {
            $getRecords .= view('Chatify::layouts.listItem', [
                'get' => 'search_item',
                'type' => 'user',
                'user' => $record,
            ])->render();
        }
        // send the response
        return Response::json([
            'records' => $records->count() > 0
                ? $getRecords
                : '<p class="message-hint"><span>Nothing to show.</span></p>',
            'addData' => 'html'
        ], 200);
    }
    /**
     * Get contacts list
     *
     * @param Request $request
     * @return JSON response
     */
    public function getContacts(Request $request)
    {
        $user_id = intval($request->query('user_id'));
        $tmpUser = $user_id ? User::find($user_id) : false;
        // get all users that received/sent message from/to [Auth user]
        $query = Message::query()->join('users',  function ($join) {
            $join->on('messages.from_id', '=', 'users.id')
                ->orOn('messages.to_id', '=', 'users.id');
        })
            ->where('messages.from_id', Auth::user()->id)
            ->orWhere('messages.to_id', Auth::user()->id);

        if($user_id){
            $query->orderByRaw('CASE when users.id = ? then 1 else 2 end',[$user_id]);
        }
        $query->orderBy('messages.created_at', 'desc');
        $users = $query->get()
            ->unique('id');

        $found = false;
        if ($users->count() > 0) {
            // fetch contacts
            $contacts = null;
            foreach ($users as $user) {
                if ($user->id != Auth::user()->id) {
                    // Get user data
                    if($tmpUser and $user->id == $user_id){
                        $found = true;
                    }
                    $userCollection = User::where('id', $user->id)->first();
                    $contacts .= Chatify::getContactItem($request['messenger_id'], $userCollection);
                }
            }
        }
        if(!$found and $tmpUser){
            $contacts = Chatify::getContactItem($request['messenger_id'], $tmpUser).$contacts;
        }

        // send the response
        return Response::json([
            'contacts' => $users->count() > 0 ? $contacts : '<br><p class="message-hint"><span>'.__('Your contact list is empty').'</span></p>',
        ], 200);
    }

    /**
     * Fetch data by id for (user/group)
     *
     * @param Request $request
     * @return collection
     */
    public function idFetchData(Request $request)
    {
        // Favorite
        $favorite = Chatify::inFavorite($request['id']);

        // User data
        if ($request['type'] == 'user') {
            $fetch = User::select(['id','email','first_name','last_name','business_name','avatar_id'])->where('id', $request['id'])->first();

        }

        // send the response
        return Response::json([
            'favorite' => $favorite,
            'fetch' => array_merge($fetch->toArray(),[
                'name'=>$fetch->name
            ]),
            'user_avatar' => $fetch->getAvatarUrl(),
        ]);
    }
}
