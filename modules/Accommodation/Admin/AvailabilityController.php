<?php
namespace Modules\Accommodation\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Accommodation\Models\Accommodation;
use Modules\Accommodation\Models\AccommodationDate;

class AvailabilityController extends \Modules\Accommodation\Controllers\AvailabilityController
{
    protected $accommodationClass;
    /**
     * @var AccommodationDate
     */
    protected $accommodationDateClass;
    protected $indexView = 'Accommodation::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/accommodation');
        $this->middleware('dashboard');
    }

}