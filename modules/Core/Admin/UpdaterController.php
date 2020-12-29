<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/6/2019
 * Time: 1:24 PM
 */
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Settings;

class UpdaterController extends  AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/core/tools');
        parent::__construct();
    }

    public function index(){

        $data = [
            'ready_for_update'=>(setting_item('envato_license_key') and setting_item('envato_username')) ? true : false
        ];
        $this->checkPermission('system_log_view');

        return view('Core::admin.updater.index',$data);
    }

    public function checkUpdate(){
        $this->checkPermission('system_log_view');

        if(!setting_item('envato_license_key') or !setting_item('envato_username'))
        {
            return redirect()->back()->with('danger',__("Please enter license key"));
        }

        $url = config('app.updater_url');

        $data = file_get_contents_curl($url,true,[
            'envato_license_key'=>setting_item('envato_license_key'),
            'envato_username'=>setting_item('envato_username'),
            'action'=>'check_update',
            'domain'=>\request()->getHost(),
            'product'=>'bookingcore',
        ]);

        $data_json =  json_decode($data,true);

        if(!$data or empty($data_json))
        {
            return redirect()->back()->with('danger',__("Can not connect to update server. Please check again"));
        }

        Settings::store('last_check_update',time());

        if(!empty($data_json['version']))
        {
            Settings::store('updater_latest_version',$data_json['version']);
        }

        if(!empty($data_json['message']))
        {
            return redirect()->back()->with($data_json['status'] ? 'success' : 'danger',__("Can not connect to update server. Please check again"));
        }

        return redirect()->back();
    }

    public function doUpdate(){

        set_time_limit(0);
        ini_set('max_execution_time', '0');

        $this->checkPermission('system_log_view');

        $updater_latest_version = setting_item('updater_latest_version');
        if(empty($updater_latest_version) or version_compare(config('app.version'),$updater_latest_version,'>=')){
            return $this->sendError(__("You are using latest version of Booking Core"));
        }

        if(!class_exists('\ZipArchive'))
        {
            return $this->sendError("Your server does not support ZipArchive libraries. Please contact your hosting to install it or do update manually");
        }

        // Try to set folder permission
        $this->chmod_r(base_path(),0755,0755);

        if(!is_writable(base_path()))
        {
            return $this->sendError("The root folder is not able to write");
        }

        $url = config('app.updater_url');
        $data = file_get_contents_curl($url,true,[
            'envato_license_key'=>setting_item('envato_license_key'),
            'envato_username'=>setting_item('envato_username'),
            'action'=>'get_update',
            'domain'=>\request()->getHost(),
            'product'=>'bookingcore'
        ]);

        $data_json =  json_decode($data,true);

        if(!$data or empty($data_json))
        {
            return $this->sendError("Can not connect to update server. Please check again");
        }

        if(empty($data_json['file']))
        {
            return $this->sendError(__("Can not get update file from server"));
        }

        $zip_file_tmp = storage_path('tmp-update.zip');

        try {
            $this->downloadFile($data_json['file'], $zip_file_tmp);
        }catch (\Exception $exception){
            return $this->sendError("downloadFile: ".$exception->getMessage());
        }

        if(!file_exists($zip_file_tmp))
        {
            return $this->sendError(__("Can not download update file to folder storage"));
        }

        $check = $this->unzipFile($zip_file_tmp,base_path());

        if($check){

            Settings::store('updater_last_success',time());
            return $this->sendSuccess([],__("Update Success"));

        }else{
            return $this->sendError(__("Can not un-zip the package"));
        }

    }

    protected function unzipFile($file,$path){

        $zip = new \ZipArchive;
        $res = $zip->open($file);
        if ($res === TRUE) {
            // extract it to the path we determined above
            $zip->extractTo($path);
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
    private function downloadFile($url, $filepath)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        $raw_file_data = curl_exec($ch);

        if(curl_errno($ch)){
            return false;
        }
        curl_close($ch);

        file_put_contents($filepath, $raw_file_data);

        return (filesize($filepath) > 0)? true : false;

    }

    public function storeLicense(){
        $this->checkPermission('system_log_view');

        \request()->validate([
            'envato_license_key'=>'required',
            'envato_username'=>'required'
        ]);

        Settings::store('envato_license_key',trim(\request()->input('envato_license_key')));
        Settings::store('envato_username',trim(\request()->input('envato_username')));

        return redirect()->back()->withInput()->with('success',__("License information has been saved"));
    }


    protected function chmod_r($dir, $dirPermissions, $filePermissions)
    {

        $dp = opendir($dir);
        while ($file = readdir($dp)) {
            if (($file == ".") || ($file == ".."))
                continue;
            $fullPath = $dir . "/" . $file;
            if (strpos($fullPath, '.git') !== false
                or strpos($fullPath, 'node_modules') !== false
                or strpos($fullPath, 'public/uploads') !== false
                or strpos($fullPath, 'storage/') !== false
            ) {

                continue;
            }
            if (is_dir($fullPath)) {
                chmod($fullPath, $dirPermissions);
                $this->chmod_r($fullPath, $dirPermissions, $filePermissions);
            } else {
                chmod($fullPath, $filePermissions);
            }
        }
        closedir($dp);
    }
}
