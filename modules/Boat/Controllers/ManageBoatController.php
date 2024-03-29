<?php
namespace Modules\Boat\Controllers;

use Modules\Booking\Models\Enquiry;
use Modules\Boat\Models\Boat;
use Modules\Boat\Models\BoatTerm;
use Modules\Boat\Models\BoatTranslation;
use Modules\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Location\Models\Location;
use Modules\Core\Models\Attributes;
use Modules\Booking\Models\Booking;

class ManageBoatController extends FrontendController
{
    protected $boatClass;
    protected $boatTranslationClass;
    protected $boatTermClass;
    protected $attributesClass;
    protected $locationClass;
    protected $bookingClass;
    protected $enquiryClass;

    public function __construct()
    {
        parent::__construct();
        $this->boatClass = Boat::class;
        $this->boatTranslationClass = BoatTranslation::class;
        $this->boatTermClass = BoatTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->bookingClass = Booking::class;
        $this->enquiryClass = Enquiry::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Boat::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
    public function manageBoat(Request $request)
    {
        $this->checkPermission('boat_view');
        $user_id = Auth::id();
        $list_tour = $this->boatClass::where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $list_tour->paginate(5),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Boats'),
                    'url'  => route('boat.vendor.index')
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Manage Boats"),
        ];
        return view('Boat::frontend.manageBoat.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('boat_view');
        $user_id = Auth::id();
        $list_tour = $this->boatClass::onlyTrashed()->where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $list_tour->paginate(5),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Boats'),
                    'url'  => route('boat.vendor.index')
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Recovery Boats"),
        ];
        return view('Boat::frontend.manageBoat.index', $data);
    }

    public function restore($id)
    {
        $this->checkPermission('boat_delete');
        $user_id = Auth::id();
        $query = $this->boatClass::onlyTrashed()->where("create_user", $user_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->restore();
        }
        return redirect(route('boat.vendor.recovery'))->with('success', __('Restore boat success!'));
    }

    public function createBoat(Request $request)
    {
        $this->checkPermission('boat_create');
        $row = new $this->boatClass();
        $data = [
            'row'           => $row,
            'translation' => new $this->boatTranslationClass(),
            'boat_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'attributes'    => $this->attributesClass::where('service', 'boat')->get(),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Boats'),
                    'url'  => route('boat.vendor.index')
                ],
                [
                    'name'  => __('Create'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Create Boats"),
        ];
        return view('Boat::frontend.manageBoat.detail', $data);
    }


    public function store( Request $request, $id ){
        if($id>0){
            $this->checkPermission('boat_update');
            $row = $this->boatClass::find($id);
            if (empty($row)) {
                return redirect(route('boat.vendor.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('boat_manage_others'))
            {
                return redirect(route('boat.vendor.index'));
            }
        }else{
            $this->checkPermission('boat_create');
            $row = new $this->boatClass();
            $row->status = "publish";
            if(setting_item("boat_vendor_create_service_must_approved_by_admin", 0)){
                $row->status = "pending";
            }
        }
        $dataKeys = [
            'title',
            'content',
            'price',
            'is_instant',
            'video',
            'faqs',
            'image_id',
            'banner_image_id',
            'gallery',
            'location_id',
            'address',
            'map_lat',
            'map_lng',
            'map_zoom',
            'number',
            'price',
            'sale_price',
            'passenger',
            'gear',
            'baggage',
            'door',
            'enable_extra_price',
            'extra_price',
            'is_featured',
            'default_state',
        ];
        if($this->hasPermission('boat_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if($id > 0 ){
                return back()->with('success',  __('Boat updated') );
            }else{
                return redirect(route('boat.vendor.edit',['id'=>$row->id]))->with('success', __('Boat created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->boatTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->boatTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->boatTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function editBoat(Request $request, $id)
    {
        $this->checkPermission('boat_update');
        $user_id = Auth::id();
        $row = $this->boatClass::where("create_user", $user_id);
        $row = $row->find($id);
        if (empty($row)) {
            return redirect(route('boat.vendor.index'))->with('warning', __('Boat not found!'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'translation'    => $translation,
            'row'           => $row,
            'boat_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'attributes'    => $this->attributesClass::where('service', 'boat')->get(),
            "selected_terms" => $row->terms->pluck('term_id'),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Boats'),
                    'url'  => route('boat.vendor.index')
                ],
                [
                    'name'  => __('Edit'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Edit Boats"),
        ];
        return view('Boat::frontend.manageBoat.detail', $data);
    }

    public function deleteBoat($id)
    {
        $this->checkPermission('boat_delete');
        $user_id = Auth::id();
        $query = $this->boatClass::where("create_user", $user_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->delete();
        }
        return redirect(route('boat.vendor.index'))->with('success', __('Delete boat success!'));
    }

    public function bulkEditBoat($id , Request $request){
        $this->checkPermission('boat_update');
        $action = $request->input('action');
        $user_id = Auth::id();
        $query = $this->boatClass::where("create_user", $user_id)->where("id", $id)->first();
        if (empty($id)) {
            return redirect()->back()->with('error', __('No item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if(empty($query)){
            return redirect()->back()->with('error', __('Not Found'));
        }
        switch ($action){
            case "make-hide":
                $query->status = "draft";
                break;
            case "make-publish":
                $query->status = "publish";
                break;
        }
        $query->save();
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function bookingReport(Request $request)
    {
        $data = [
            'bookings' => $this->bookingClass::getBookingHistory($request->input('status'), false , Auth::id() , 'boat'),
            'statues'  => config('booking.statuses'),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Boat'),
                    'url'  => route('boat.vendor.index')
                ],
                [
                    'name' => __('Booking Report'),
                    'class'  => 'active'
                ]
            ],
            'page_title'         => __("Booking Report"),
        ];
        return view('Boat::frontend.manageBoat.bookingReport', $data);
    }

    public function bookingReportBulkEdit($booking_id , Request $request){
        $status = $request->input('status');
        if (!empty(setting_item("boat_allow_vendor_can_change_their_booking_status")) and !empty($status) and !empty($booking_id)) {
            $query = $this->bookingClass::where("id", $booking_id);
            $query->where("vendor_id", Auth::id());
            $item = $query->first();
            if(!empty($item)){
                $item->status = $status;
                $item->save();

                if($status == Booking::CANCELLED) $item->tryRefundToWallet();

                $item->sendStatusUpdatedEmails();
                return redirect()->back()->with('success', __('Update success'));
            }
            return redirect()->back()->with('error', __('Booking not found!'));
        }
        return redirect()->back()->with('error', __('Update fail!'));
    }
}
