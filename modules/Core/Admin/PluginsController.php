<?php
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Core\Models\Plugins;

class PluginsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/core/tools');
    }

    public function index(Request $request)
    {
        $this->checkPermission('plugin_manage');
        $plugins = Plugins::getAllPlugins();
        $data = [
            'rows'               => $plugins,
            'breadcrumbs'        => [
                [
                    'name' => __('Plugins'),
                    'url'  => 'admin/module/core/plugins'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Plugin Management")
        ];
        return view('Core::admin.plugins.index', $data);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('plugin_manage');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        switch ($action){
            case "active":
                Plugins::updateActivePlugins($ids);
                return redirect()->back()->with('success', __('Active success!'));
                break;
            case "deactivate":
                Plugins::updateDeactivatePlugins($ids);
                return redirect()->back()->with('success', __('Deactivate success!'));
                break;
            default:
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
    }
}