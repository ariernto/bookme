<?php
namespace Modules\Social\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\Social\Models\Forum;
use Modules\Social\Models\Post;

class SocialController extends FrontendController
{
    public function index(){
        $data = [
            'rows'=>Post::search(['feed'=>1])->with(['user'])->paginate(20),
            'forums'=>Forum::query()->where('status','publish')->get(),
            'body_class'=>'social_page_body'
        ];
        return view('Social::frontend.index',$data);
    }

    public function post_store(){

        $post = new Post();
        $post->content = request()->input('content');
        $post->user_id = Auth::id();
        $post->publish_date = date('Y-m-d H:i:s');
        $post->save();

        return back()->with("success",__("Success"));
    }
}
