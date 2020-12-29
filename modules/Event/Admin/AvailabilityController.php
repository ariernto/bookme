<?php
namespace Modules\Event\Admin;

use Modules\Event\Models\EventDate;

class AvailabilityController extends \Modules\Event\Controllers\AvailabilityController
{
    protected $eventClass;
    /**
     * @var EventDate
     */
    protected $eventDateClass;
    protected $indexView = 'Event::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('event.admin.index'));
        $this->middleware('dashboard');
    }

}
