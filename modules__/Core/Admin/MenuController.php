<?php
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Core\Models\Menu;
use Modules\Core\Models\MenuTranslation;
use Modules\News\Models\NewsCategory;
use Modules\Page\Models\Template;

class MenuController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/core/menu');
        parent::__construct();
    }

    public function index()
    {

        $this->checkPermission('menu_view');
        $data = [
            'rows'           => Menu::paginate(20),
            'locations'      => $this->getLocations(),
            "menu_locations" => (array)json_decode(setting_item('menu_locations'), true)
        ];
        return view('Core::admin.menu.index', $data);
    }

    public function getLocations()
    {
        return [
            'primary' => __("Primary"),
//            'footer'  => __("Footer"),
        ];
    }

    public function create()
    {

        $this->checkPermission('menu_create');
        $data = [
            'row'                    => new Menu(),
            'locations'              => $this->getLocations(),
            'current_menu_locations' => [],
            'breadcrumbs'            => [
                [
                    'name' => __('Menus'),
                    'url'  => 'admin/module/core/menu'
                ],
                [
                    'name'  => __('Create new menu'),
                    'class' => 'active'
                ],
            ],
            'translation'=>new MenuTranslation()
        ];
        return view('Core::admin.menu.detail', $data);
    }

    public function edit($id)
    {

        $this->checkPermission('menu_update');
        $row = Menu::find($id);
        if (empty($row)) {
            abort(404);
        }
        $setting = json_decode(setting_item('menu_locations'), true);
        $current_menu_locations = [];
        if (!empty($setting) and is_array($setting)) {
            foreach ($setting as $location => $item) {
                if ($item == $id) {
                    $current_menu_locations[] = $location;
                }
            }
        }
        $translation = $row->translateOrOrigin(request()->get('lang'));

        $data = [
            'row'                    => $row,
            'translation'            => $translation,
            'locations'              => $this->getLocations(),
            'current_menu_locations' => $current_menu_locations,
            'breadcrumbs'            => [
                [
                    'name' => __('Menus'),
                    'url'  => 'admin/module/core/menu'
                ],
                [
                    'name'  => __('Edit: ') . $row->name,
                    'class' => 'active'
                ],
            ],
            'enable_multi_lang'=>true
        ];

        return view('Core::admin.menu.detail', $data);
    }

    public function searchTypeItems(Request $request)
    {

        $class = $request->input('class');
        $q = $request->input('q');
        if (class_exists($class) and method_exists($class, 'searchForMenu')) {

            $menuItems = call_user_func([
                $class,
                'searchForMenu'
            ], $q);

            foreach ($menuItems as $k => &$menuItem) {
                $menuItem['class'] = '';
                $menuItem['target'] = '';
                $menuItem['open'] = false;
                $menuItem['item_model'] = $class;
                $menuItem['origin_name'] = $menuItem['name'];
                $menuItem['model_name'] =$class::getModelName();
            }

            return $this->sendSuccess([
                'data' => $menuItems
            ]);
        }
        return $this->sendSuccess([
            'data' => []
        ]);
    }

    public function getTypes()
    {
        $menuModels = [
            [
                'class' => \Modules\Page\Models\Page::class,
                'name'  => __("Page"),
                'items' => \Modules\Page\Models\Page::searchForMenu(),
                'position'=>10
            ],
            [
                'class' => \Modules\Location\Models\Location::class,
                'name'  => __("Location"),
                'items' => \Modules\Location\Models\Location::searchForMenu(),
                'position'=>40
            ],
            [
                'class' => \Modules\News\Models\News::class,
                'name'  => __("News"),
                'items' => \Modules\News\Models\News::searchForMenu(),
                'position'=>50
            ],
            [
                'class' => NewsCategory::class,
                'name'  => __("News Category"),
                'items' => NewsCategory::searchForMenu(),
                'position'=>60
            ],
        ];

        // Modules
        $custom_modules = \Modules\ServiceProvider::getModules();
        if(!empty($custom_modules)){
            foreach($custom_modules as $module){
                $moduleClass = "\\Modules\\".ucfirst($module)."\\ModuleProvider";
                if(class_exists($moduleClass))
                {
                    $menuConfig = call_user_func([$moduleClass,'getMenuBuilderTypes']);

                    if(!empty($menuConfig)){
                        $menuModels = array_merge($menuModels,$menuConfig);
                    }

                }

            }
        }
        // Plugins Menu
        $plugins_modules = \Plugins\ServiceProvider::getModules();
        if(!empty($plugins_modules)){
            foreach($plugins_modules as $module){
                $moduleClass = "\\Plugins\\".ucfirst($module)."\\ModuleProvider";
                if(class_exists($moduleClass))
                {
                    $menuConfig = call_user_func([$moduleClass,'getMenuBuilderTypes']);
                    if(!empty($menuConfig)){
                        $menuModels = array_merge($menuModels,$menuConfig);
                    }
                }
            }
        }
        // Custom Menu
        $custom_modules = \Custom\ServiceProvider::getModules();
        if(!empty($custom_modules)){
            foreach($custom_modules as $module){
                $moduleClass = "\\Custom\\".ucfirst($module)."\\ModuleProvider";
                if(class_exists($moduleClass))
                {
                    $menuConfig = call_user_func([$moduleClass,'getMenuBuilderTypes']);

                    if(!empty($menuConfig)){
                        $menuModels = array_merge($menuModels,$menuConfig);
                    }

                }

            }
        }

        $menuModels = array_values(\Illuminate\Support\Arr::sort($menuModels, function ($value) {
            return $value['position'] ?? 100;
        }));
        foreach ($menuModels as $k => &$item) {
            $item['q'] = '';
            $item['open'] = !$k ? true : false;
            $item['selected'] = [];
            if (!empty($item['items'])) {
                foreach ($item['items'] as &$menuItem) {
                    $menuItem['class'] = '';
                    $menuItem['target'] = '';
                    $menuItem['open'] = false;
                    $menuItem['item_model'] = $item['class'];
                    $menuItem['origin_name'] = $item['name'];
                    $menuItem['model_name'] = $item['class']::getModelName();
                }
            }
        }
        return $this->sendSuccess(['data' => $menuModels]);
    }

    public function getItems(Request $request)
    {

        $menu = Menu::find($request->input('id'));
        if (empty($menu))
            return $this->sendError(__("Menu not found"));
        return $this->sendSuccess(['data' => json_decode($menu->items, true)]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required',
            'name'  => 'required|max:255'
        ]);
        if ($request->input('id')) {

            $this->checkPermission('menu_update');
            $menu = Menu::find($request->input('id'));
        } else {

            $this->checkPermission('menu_create');
            $menu = new Menu();
        }
        if (empty($menu))
            return $this->sendError(__('Menu not found'));

        $items = json_decode($request->input('items'),true);
        $newItems = clean_by_key($items, 'name');
        $menu->items = $newItems;
        $menu->name = $request->input('name');
        $menu->saveOriginOrTranslation($request->input('lang'));


        $setting = json_decode(setting_item('menu_locations'), true);
        $hasChange = false;
        if (!empty($setting)) {
            foreach ($setting as $location => $menuId) {
                if ($menuId == $menu->id) {
                    $setting[$location] = '';
                }
            }
        }
        // Save Locations
        $locations = $request->input('locations');
        if (!empty($locations)) {
            foreach ($locations as $location) {
                if (!isset($setting[$location]))
                    $setting[$location] = [];
                $setting[$location] = $menu->id;
            }
        }
        setting_update_item('menu_locations', json_encode($setting));
        return $this->sendSuccess([
            'url' => $request->input('id') ? '' : url('admin/module/core/menu/edit/' . $menu->id)
        ], __('Your menu has been saved'));
    }
}
