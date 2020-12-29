<?php
namespace Modules\Sauna\Admin;

use Modules\Sauna\Models\SaunaDate;

class AvailabilityController extends \Modules\Sauna\Controllers\AvailabilityController
{
    protected $saunaClass;
    /**
     * @var SaunaDate
     */
    protected $saunaDateClass;
    protected $indexView = 'Sauna::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('sauna.admin.index'));
        $this->middleware('dashboard');
    }

}
