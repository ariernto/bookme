<?php
namespace Modules\Boat\Admin;

use Modules\Boat\Models\BoatDate;

class AvailabilityController extends \Modules\Boat\Controllers\AvailabilityController
{
    protected $boatClass;
    /**
     * @var BoatDate
     */
    protected $boatDateClass;
    protected $indexView = 'Boat::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/boat');
        $this->middleware('dashboard');
    }

}
