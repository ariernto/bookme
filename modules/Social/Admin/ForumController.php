<?php
namespace Modules\Social\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Social\Models\Forum;
use Modules\Social\Models\Socialforum;
use Modules\Social\Models\SocialforumTranslation;

class ForumController extends AdminController
{
    protected $forumClass;
    public function __construct()
    {
        parent::__construct();
        $this->forumClass = Forum::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('social_manage_forum');
        $listforum = $this->forumClass::query();
        if (!empty($search = $request->query('s'))) {
            $listforum->where('name', 'LIKE', '%' . $search . '%');
        }
        $listforum->orderBy('created_at', 'desc');
        $data = [
            'rows'        => $listforum->paginate(20),
            'row'         => new $this->forumClass(),
            'breadcrumbs' => [
                [
                    'name' => __('Social'),
                    'url'  => route('social.admin.index')
                ],
                [
                    'name'  => __('Forum'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Social::admin.forum.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('social_manage_forum');
        $row = $this->forumClass::find($id);
        if (empty($row)) {
            return redirect(route('Social.admin.forum.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'row'         => $row,
            'parents'     => $this->forumClass::get()->toTree(),
            'breadcrumbs' => [
                [
                    'name' => __('Social'),
                    'url'  => route('social.admin.index')
                ],
                [
                    'name'  => __('Forum'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Social::admin.forum.detail', $data);
    }

    public function store(Request $request , $id)
    {
        $this->checkPermission('social_manage_forum');
        $this->validate($request, [
            'name' => 'required'
        ]);
        if($id>0){
            $row = $this->forumClass::find($id);
            if (empty($row)) {
                return redirect(route('Social.admin.forum.index'));
            }
        }else{
            $row = new $this->forumClass();
            $row->status = "publish";
        }

        $row->fill($request->input());
        $res = $row->save();

        if ($res) {
            return back()->with('success',  __('forum saved') );
        }
    }

    public function editBulk(Request $request)
    {
        $this->checkPermission('social_manage_forum');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Select an Action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = $this->forumClass::where("id", $id)->first();
                if(!empty($query)){
                    //Sync child forum
                    $list_childs = $this->forumClass::where("parent_id", $id)->get();
                    if(!empty($list_childs)){
                        foreach ($list_childs as $child){
                            $child->parent_id = null;
                            $child->save();
                        }
                    }
                    //Del parent forum
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = $this->forumClass::where("id", $id);
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Updated success!'));
    }
}
