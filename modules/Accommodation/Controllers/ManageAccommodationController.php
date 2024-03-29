<?php
namespace Modules\Accommodation\Controllers;

use Modules\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Accommodation\Models\Accommodation;
use Modules\Location\Models\Location;
use Modules\Core\Models\Attributes;
use Modules\Booking\Models\Booking;
use Modules\Accommodation\Models\AccommodationTerm;
use Modules\Accommodation\Models\AccommodationTranslation;

class ManageAccommodationController extends FrontendController
{
    protected $accommodationClass;
    protected $accommodationTranslationClass;
    protected $accommodationTermClass;
    protected $attributesClass;
    protected $locationClass;
    protected $bookingClass;

    public function __construct()
    {
        parent::__construct();
        $this->accommodationClass = Accommodation::class;
        $this->accommodationTranslationClass = AccommodationTranslation::class;
        $this->accommodationTermClass = AccommodationTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->bookingClass = Booking::class;
    }
    public function callAction($method, $parameters)
    {
        if(!Accommodation::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function manageAccommodation(Request $request)
    {
        $this->checkPermission('accommodation_view');
        $user_id = Auth::id();
        $rows = $this->accommodationClass::where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $rows->paginate(5),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Accommodations'),
                    'url'  => route('accommodation.vendor.index')
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Manage Accommodations"),
        ];
        return view('Accommodation::frontend.manageAccommodation.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('accommodation_view');
        $user_id = Auth::id();
        $rows = $this->accommodationClass::onlyTrashed()->where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $rows->paginate(5),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Accommodations'),
                    'url'  => route('accommodation.vendor.index')
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Recovery Accommodations"),
        ];
        return view('Accommodation::frontend.manageAccommodation.index', $data);
    }

    public function restore($id)
    {
        $this->checkPermission('accommodation_delete');
        $user_id = Auth::id();
        $query = $this->accommodationClass::onlyTrashed()->where("create_user", $user_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->restore();
        }
        return redirect(route('accommodation.vendor.recovery'))->with('success', __('Restore accommodation success!'));
    }

    public function createAccommodation(Request $request)
    {
        $this->checkPermission('accommodation_create');
        $row = new $this->accommodationClass();
        $data = [
            'row'           => $row,
            'translation' => new $this->accommodationTranslationClass(),
            'accommodation_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'attributes'    => $this->attributesClass::where('service', 'accommodation')->get(),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Accommodations'),
                    'url'  => route('accommodation.vendor.index')
                ],
                [
                    'name'  => __('Create'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Create Accommodations"),
        ];
        return view('Accommodation::frontend.manageAccommodation.detail', $data);
    }


    public function store( Request $request, $id ){

        if($id>0){
            $this->checkPermission('accommodation_update');
            $row = $this->accommodationClass::find($id);
            if (empty($row)) {
                return redirect(route('accommodation.vendor.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('accommodation_manage_others'))
            {
                return redirect(route('accommodation.vendor.index'));
            }
        }else{
            $this->checkPermission('accommodation_create');
            $row = new $this->accommodationClass();
            $row->status = "publish";
            if(setting_item("accommodation_vendor_create_service_must_approved_by_admin", 0)){
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
            'bed',
            'bathroom',
            'square',
            'location_id',
            'address',
            'map_lat',
            'map_lng',
            'map_zoom',
            'default_state',
            'price',
            'sale_price',
            'max_guests',
            'enable_extra_price',
            'extra_price',
            'is_featured',
            'default_state',
            'min_day_before_booking',
            'min_day_stays',
        ];
        if($this->hasPermission('accommodation_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
	    $row->ical_import_url  = $request->ical_import_url;

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if($id > 0 ){
                return back()->with('success',  __('Accommodation updated') );
            }else{
                return redirect(route('accommodation.vendor.edit',['id'=>$row->id]))->with('success', __('Accommodation created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->accommodationTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->accommodationTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->accommodationTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function editAccommodation(Request $request, $id)
    {
        $this->checkPermission('accommodation_update');
        $user_id = Auth::id();
        $row = $this->accommodationClass::where("create_user", $user_id);
        $row = $row->find($id);
        if (empty($row)) {
            return redirect(route('accommodation.vendor.index'))->with('warning', __('Accommodation not found!'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'translation'    => $translation,
            'row'           => $row,
            'accommodation_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'attributes'    => $this->attributesClass::where('service', 'accommodation')->get(),
            "selected_terms" => $row->terms->pluck('term_id'),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Accommodations'),
                    'url'  => route('accommodation.vendor.index')
                ],
                [
                    'name'  => __('Edit'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Edit Accommodations"),
        ];
        return view('Accommodation::frontend.manageAccommodation.detail', $data);
    }

    public function deleteAccommodation($id)
    {
        $this->checkPermission('accommodation_delete');
        $user_id = Auth::id();
        $query = $this->accommodationClass::where("create_user", $user_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->delete();
        }
        return redirect(route('accommodation.vendor.index'))->with('success', __('Delete accommodation success!'));
    }

    public function bulkEditAccommodation($id , Request $request){
        $this->checkPermission('accommodation_update');
        $action = $request->input('action');
        $user_id = Auth::id();
        $query = $this->accommodationClass::where("create_user", $user_id)->where("id", $id)->first();
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
            'bookings' => $this->bookingClass::getBookingHistory($request->input('status'), false , Auth::id() , 'accommodation'),
            'statues'  => config('booking.statuses'),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Accommodation'),
                    'url'  => route('accommodation.vendor.index')
                ],
                [
                    'name' => __('Booking Report'),
                    'class'  => 'active'
                ]
            ],
            'page_title'         => __("Booking Report"),
        ];
        return view('Accommodation::frontend.manageAccommodation.bookingReport', $data);
    }

    public function bookingReportBulkEdit($booking_id , Request $request){
        $status = $request->input('status');
        if (!empty(setting_item("accommodation_allow_vendor_can_change_their_booking_status")) and !empty($status) and !empty($booking_id)) {
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

	public function cloneAccommodation(Request $request,$id){
		$this->checkPermission('accommodation_update');
		$user_id = Auth::id();
		$row = $this->accommodationClass::where("create_user", $user_id);
		$row = $row->find($id);
		if (empty($row)) {
			return redirect(route('accommodation.vendor.index'))->with('warning', __('Accommodation not found!'));
		}
		try{
			$clone = $row->replicate();
			$clone->status  = 'draft';
			$clone->push();
			if(!empty($row->terms)){
				foreach ($row->terms as $term){
					$e= $term->replicate();
					if($e->push()){
						$clone->terms()->save($e);

					}
				}
			}
			if(!empty($row->meta)){
				$e= $row->meta->replicate();
				if($e->push()){
					$clone->meta()->save($e);

				}
			}
			if(!empty($row->translations)){
				foreach ($row->translations as $translation){
					$e = $translation->replicate();
					$e->origin_id = $clone->id;
					if($e->push()){
						$clone->translations()->save($e);
					}
				}
			}

			return redirect()->back()->with('success',__('Accommodation clone was successful'));
		}catch (\Exception $exception){
			$clone->delete();
			return redirect()->back()->with('warning',__($exception->getMessage()));
		}
	}
}
