<?php

namespace App\Http\Controllers;

use App\Helpers\Assets;
use function Clue\StreamFilter\fun;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Page\Models\Page;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sendError($message,$data = []){

        $data['status'] = 0;

        return $this->sendSuccess($data,$message);

    }

    public function sendSuccess($data = [],$message = '')
    {
        if(is_string($data))
        {
            return response()->json([
                'message'=>$data,
                'status'=>true
            ]);
        }

        if(!isset($data['status'])) $data['status'] = 1;

        if($message)
        $data['message'] = $message;

        return response()->json($data);
    }


    public function setActiveMenu($item)
    {
        set_active_menu($item);
    }

    public function currentUser()
    {
        return Auth::user();
    }

    protected function filterLang(&$query){

        if(!setting_item('site_enable_multi_lang') or !setting_item('site_locale')) return false;

        if($lang = request()->route('locale'))
        {
            if($lang != setting_item('site_locale'))
                $query->where('lang',$lang);
            else{
                $query->where(function ($query){
                    $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
                });
            }
        }else{
            $query->where(function ($query){
                $query->whereRAW("IFNULL(lang,'') = '' ")->orWhere('lang','=',setting_item('site_locale'));
            });
        }
    }

    protected function registerJs($file,$inFooter = true, $pos = 10,$version = false){
        Assets::registerJs($file,$inFooter,$pos,$version);
    }
    protected function registerCss($file,$inFooter = false, $pos = 10,$version = false){
        Assets::registerCss($file,$inFooter,$pos,$version);
    }

}
