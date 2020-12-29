<?php
$menus = [
    'admin'=>[
        'url'   => 'admin',
        'title' => __("Dashboard"),
        'icon'  => 'icon ion-ios-desktop',
        "position"=>0
    ],
    'review'=>[
        "position"=>50,
        'url'   => 'admin/module/review',
        'title' => __("Reviews"),
        'icon'  => 'icon ion-ios-text',
        'permission' => 'review_manage_others',
    ],
    'menu'=>[
        "position"=>60,
        'url'        => 'admin/module/core/menu',
        'title'      => __("Menu"),
        'icon'       => 'icon ion-ios-apps',
        'permission' => 'menu_view',
    ],
    'template'=>[
        "position"=>70,
        'url'        => 'admin/module/template',
        'title'      => __('Templates'),
        'icon'       => 'icon ion-logo-html5',
        'permission' => 'template_create',
    ],
    'general'=>[
        "position"=>80,
        'url'        => 'admin/module/core/settings/index/general',
        'title'      => __('Setting'),
        'icon'       => 'icon ion-ios-cog',
        'permission' => 'setting_update',
        'children'   => \Modules\Core\Models\Settings::getSettingPages()
    ],
    'tools'=>[
        "position"=>90,
        'url'      => 'admin/module/core/tools',
        'title'    => __("Tools"),
        'icon'     => 'icon ion-ios-hammer',
        'children' => [
            'language'=>[
                'url'        => 'admin/module/language',
                'title'      => __('Languages'),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_manage',
            ],
            'translations'=>[
                'url'        => 'admin/module/language/translations',
                'title'      => __("Translation Manager"),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_translation',
            ],
            'logs'=>[
                'url'        => 'admin/logs',
                'title'      => __("System Logs"),
                'icon'       => 'icon ion-ios-nuclear',
                'permission' => 'system_log_view',
            ],
        ]
    ],
];

// Modules
$custom_modules = \Modules\ServiceProvider::getModules();
if(!empty($custom_modules)){
    foreach($custom_modules as $module){
        $moduleClass = "\\Modules\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);

            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }

            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);

            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;

                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }

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
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);
            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);
            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }
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
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);

            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }

            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);

            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }

            }
        }

    }
}

$currentUrl = url(\Modules\Core\Walkers\MenuWalker::getActiveMenu());
$user = \Illuminate\Support\Facades\Auth::user();
if (!empty($menus)){
    foreach ($menus as $k => $menuItem) {

        if (!empty($menuItem['permission']) and !$user->hasPermissionTo($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !$user->hasPermissionTo($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active' : '';
            }
        }
    }

    //@todo Sort Menu by Position
    $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
        return $value['position'] ?? 100;
    }));
}

?>
<ul class="main-menu">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $menuItem['class'] .= " ".str_ireplace("/","_",$menuItem['url']) ?>
        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem['url'])); ?>">
                <?php if(!empty($menuItem['icon'])): ?>
                    <span class="icon text-center"><i class="<?php echo e($menuItem['icon']); ?>"></i></span>
                <?php endif; ?>
                <?php echo clean($menuItem['title'],[
                    'Attr.AllowedClasses'=>null
                ]); ?>

            </a>
            <?php if(!empty($menuItem['children'])): ?>
                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
                <ul class="children">
                    <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem2['url'])); ?>">
                                <?php if(!empty($menuItem2['icon'])): ?>
                                    <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                                <?php endif; ?>
                                <?php echo clean($menuItem2['title'],[
                                    'Attr.AllowedClasses'=>null
                                ]); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Layout/admin/parts/sidebar.blade.php ENDPATH**/ ?>