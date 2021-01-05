<?php
namespace Modules\Car\Admin;

use Modules\Car\Models\CarDate;

class AvailabilityController extends \Modules\Car\Controllers\AvailabilityController
{
    protected $carClass;
    /**
     * @var CarDate
     */
    protected $carDateClass;
    protected $indexView = 'Car::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/car');
        $this->middleware('dashboard');
    }

}
