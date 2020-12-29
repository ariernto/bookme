<?php
namespace Modules\Social\Models;
use App\BaseModel;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use function Clue\StreamFilter\fun;

class Post extends BaseModel
{
    use SoftDeletes;

    protected $table = 'social_posts';
    protected $fillable = [
        'content',
    ];

    protected $attributes = [
        'privacy'=>'public',
        'status'=>'public'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }

    public static function search($filters = []){
        $query = parent::query();
        $query->select('social_posts.*');

        if(!empty($filters['feed'])){
            // If only get posts for news feed of current user
            $query->where('user_id',Auth::id())->orWhere(function($query) use($filters){
                $query->whereIn('user_id',function($query2){
                    $query2->select('to_user')
                            ->from('social_user_follow')
                            ->where('from_user',Auth::id());
                });
            });

        }else{

        }

        $query->where('status','publish');
        $query->orderBy('publish_date','desc');
        return $query;
    }
}
