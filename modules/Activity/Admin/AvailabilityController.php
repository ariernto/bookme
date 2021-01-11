<?php
namespace Modules\Activity\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Space\Models\Space;
use Modules\Space\Models\SpaceDate;

class AvailabilityController extends \Modules\Activity\Controllers\AvailabilityController
{
    protected $spaceClass;
    /**
     * @var SpaceDate
     */
    protected $spaceDateClass;
    protected $indexView = 'Activity::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/activity');
        $this->middleware('dashboard');
    }

}
