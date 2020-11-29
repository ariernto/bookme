<?php
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\AdminController;
use Modules\Core\Models\Settings;
use Illuminate\Support\Facades\Cache;

class SettingsController extends AdminController
{
    protected $groups = [];

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/core/settings/index/general');
    }

    public function index($group)
    {

        if(empty($this->groups)){
            $this->setGroups();
        }

        $this->checkPermission('setting_update');
        $settingsGroupKeys = array_keys($this->groups);
        if (empty($group) or !in_array($group, $settingsGroupKeys)) {
            $group = $settingsGroupKeys[0];
        }
        $data = [
            'current_group' => $group,
            'groups'        => $this->groups,
            'settings'      => Settings::getSettings($group),
//            'translations'      => Settings::getSettings($group,request()->query('lang')),
            'breadcrumbs'   => [
                ['name' => $this->groups[$group]['name'] ?? $this->groups[$group]['title'] ?? ''],
            ],
            'page_title'    => $this->groups[$group]['name'] ?? $this->groups[$group]['title'] ?? $group,
            'group'         => $this->groups[$group],
            'enable_multi_lang'=>true
        ];
        return view('Core::admin.settings.index', $data);
    }

    public function store(Request $request, $group)
    {

        if(empty($this->groups)){
            $this->setGroups();
        }

        $this->checkPermission('setting_update');
        $settingsGroupKeys = array_keys($this->groups);
        if (empty($group) or !in_array($group, $settingsGroupKeys)) {
            $group = $settingsGroupKeys[0];
        }
        $group_data = $this->groups[$group];
        $keys = [];
        $htmlKeys = [];
        switch ($group) {
            case 'general':
                $keys = [
                    'site_title',
                    'site_desc',
                    'site_favicon',
                    'admin_email',
                    'email_from_name',
                    'email_from_address',
                    'home_page_id',
                    'topbar_left_text',
                    'logo_id',
                    'footer_text_left',
                    'footer_text_right',
                    'list_widget_footer',
                    'date_format',
                    'site_timezone',
                    'site_locale',
                    'site_first_day_of_the_weekin_calendar',
                    'site_enable_multi_lang',
                    'enable_rtl',

                    'page_contact_title',
                    'page_contact_sub_title',
                    'page_contact_desc',
                    'page_contact_image',
                ];
                break;
            case 'style':
                $keys = [
                    'style_main_color',
                    'style_custom_css',
                    'style_typo',
                ];
                Settings::clearCustomCssCache();
                break;
            case 'advance':
                $keys = [
                    'map_provider',
                    'map_gmap_key',
                    'google_client_secret',
                    'google_client_id',
                    'google_enable',
                    'facebook_client_secret',
                    'facebook_client_id',
                    'facebook_enable',
                    'twitter_enable',
                    'twitter_client_id',
                    'twitter_client_secret',
                    'recaptcha_enable',
                    'recaptcha_api_key',
                    'recaptcha_api_secret',
                    'head_scripts',
                    'body_scripts',
                    'footer_scripts',
                    'size_unit',

                    'cookie_agreement_enable',
                    'cookie_agreement_button_text',
                    'cookie_agreement_content',

                ];
                break;
        }
        if(!empty($group_data['keys'])) $keys = $group_data['keys'];
        if(!empty($group_data['html_keys'])) $htmlKeys = $group_data['html_keys'];

        $lang = $request->input('lang');
        if(is_default_lang($lang)) $lang = false;


        if (!empty($request->input())) {
            if (!empty($keys)) {

                $all_values = $request->input();
                //If we found callback validate data before save
                if(!empty($group_data['filter_values_callback']) and is_callable($group_data['filter_values_callback']))
                {
                    $all_values = call_user_func($group_data['filter_values_callback'],$all_values,$request);
                }


                foreach ($keys as $key) {
                    $setting_key = $key.($lang ? '_'.$lang : '');

                    $check = Settings::where('name', $setting_key)->first();

                    if (!$check) {
                        $a = new Settings();
                        $a->name = $setting_key;
                        $a->val = $all_values[$key] ?? '';
                        $a->group = $group;
                        if (is_array($a->val)) {
                            $a->val = json_encode($a->val);
                        }
                        if (in_array($key, $htmlKeys)) {
                            $a->val = clean($a->val);
                        }
                        $a->save();
                    } else {
                        $check->val = $all_values[$key] ?? '';
                        if (is_array($check->val)) {
                            $check->val = json_encode($check->val);
                        }
                        if (in_array($key, $htmlKeys)) {
                            $check->val = clean($check->val);
                        }
                        $check->save();
                    }
                    Cache::forget('setting_' . $setting_key);
                }
            }
            //Clear Cache for currency
            Session::put('bc_current_currency',"");
            return redirect()->back()->with('success', __('Settings Saved'));
        }
    }


    protected function setGroups(){

        $all = Settings::getSettingPages();

        $res = [];

        if(!empty($all))
        {
            foreach ($all as $item){
                $res[$item['id']] = $item;
            }
        }
        $this->groups = $res;
    }
}
