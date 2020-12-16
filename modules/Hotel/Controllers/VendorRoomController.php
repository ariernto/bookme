<?php
namespace Modules\Hotel\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\Core\Models\Attributes;
use Modules\Hotel\Models\HotelRoom;
use Modules\Hotel\Models\HotelRoomTerm;
use Modules\Hotel\Models\HotelRoomTranslation;
use Modules\Location\Models\Location;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelTerm;
use Modules\Hotel\Models\HotelTranslation;

class VendorRoomController extends FrontendController
{
    protected $hotelClass;
    protected $roomTermClass;
    protected $attributesClass;
    protected $locationClass;
    /**
     * @var HotelRoom
     */
    protected $roomClass;
    protected $currentHotel;
    protected $roomTranslationClass;

    public function __construct()
    {
        parent::__construct();
        $this->hotelClass = Hotel::class;
        $this->roomTermClass = HotelRoomTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->roomClass = HotelRoom::class;
        $this->roomTranslationClass = HotelRoomTranslation::class;
    }

    protected function hasHotelPermission($hotel_id = false){
        if(empty($hotel_id)) return false;
        $hotel = $this->hotelClass::find($hotel_id);
        if(empty($hotel)) return false;
        if(!$this->hasPermission('hotel_update') and $hotel->create_user != Auth::id()){
            return false;
        }
        $this->currentHotel = $hotel;
        return true;
    }
    public function index(Request $request,$hotel_id)
    {
        $this->checkPermission('hotel_view');

        if(!$this->hasHotelPermission($hotel_id))
        {
            abort(403);
        }
        $query = $this->roomClass::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($hotel_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $hotel_name . '%');
            $query->orderBy('title', 'asc');
        }
        $query->where('parent_id',$hotel_id);
        $data = [
            'rows'               => $query->with(['author'])->paginate(20),
            'breadcrumbs'        => [
                [
                    'name' => __('Hotels'),
                    'url'  => route('hotel.vendor.index')
                ],
                [
                    'name' => __('Hotel: :name',['name'=>$this->currentHotel->title]),
                    'url'  => route('hotel.vendor.edit',[$this->currentHotel->id])
                ],
                [
                    'name'  => __('All Rooms'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Room Management"),
            'hotel'=>$this->currentHotel,
            'row'=> new $this->roomClass(),
            'translation'=>new $this->roomTranslationClass(),
            'attributes'     => $this->attributesClass::where('service', 'hotel_room')->get(),
        ];
        return view('Hotel::frontend.vendorHotel.room.index', $data);
    }

    public function create($hotel_id)
    {
        $this->checkPermission('hotel_update');

        if(!$this->hasHotelPermission($hotel_id))
        {
            abort(403);
        }
        $row = new $this->roomClass();
        $translation = new $this->roomTranslationClass();
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'attributes'     => $this->attributesClass::where('service', 'hotel_room')->get(),
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Hotels'),
                    'url'  => route('hotel.vendor.index')
                ],
                [
                    'name' => __('Hotel: :name',['name'=>$this->currentHotel->title]),
                    'url'  => route('hotel.vendor.edit',[$this->currentHotel->id])
                ],
                [
                    'name' => __('All Rooms'),
                    'url'  => route("hotel.vendor.room.index",['hotel_id'=>$this->currentHotel->id])
                ],
                [
                    'name'  => __('Create'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Create Room"),
            'hotel'=>$this->currentHotel
        ];
        return view('Hotel::frontend.vendorHotel.room.detail', $data);
    }

    public function edit(Request $request, $hotel_id,$id)
    {
        $this->checkPermission('hotel_update');

        if(!$this->hasHotelPermission($hotel_id))
        {
            abort(403);
        }

        $row = $this->roomClass::find($id);
        if (empty($row) or $row->parent_id != $hotel_id) {
            return redirect(route('hotel.vendor.room.index',['hotel_id'=>$hotel_id]));
        }

        $translation = $row->translateOrOrigin($request->query('lang'));

        $data = [
            'row'            => $row,
            'translation'    => $translation,
            "selected_terms" => $row->terms->pluck('term_id'),
            'attributes'     => $this->attributesClass::where('service', 'hotel_room')->get(),
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Hotels'),
                    'url'  => route('hotel.vendor.index')
                ],
                [
                    'name' => __('Hotel: :name',['name'=>$this->currentHotel->title]),
                    'url'  => route('hotel.vendor.edit',[$this->currentHotel->id])
                ],
                [
                    'name' => __('All Rooms'),
                    'url'  => route("hotel.vendor.room.index",['hotel_id'=>$this->currentHotel->id])
                ],
                [
                    'name' => __('Edit room: :name',['name'=>$row->title]),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Edit: :name",['name'=>$row->title]),
            'hotel'=>$this->currentHotel
        ];
        return view('Hotel::frontend.vendorHotel.room.detail', $data);
    }

    public function store( Request $request, $hotel_id,$id ){

        if(!$this->hasHotelPermission($hotel_id))
        {
            abort(403);
        }
        if($id>0){
            $this->checkPermission('hotel_update');
            $row = $this->roomClass::find($id);
            if (empty($row)) {
                return redirect(route('hotel.vendor.index'));
            }
            if($row->parent_id != $hotel_id)
            {
                return redirect(route('hotel.vendor.room.index'));
            }
        }else{
            $this->checkPermission('hotel_create');
            $row = new $this->roomClass();
            $row->status = "publish";
        }

        $dataKeys = [
            'title',
            'content',
            'image_id',
            'gallery',
            'price',
            'number',
            'beds',
            'size',
            'adults',
            'children',
        ];

        $row->fillByAttr($dataKeys,$request->input());
        $row->ical_import_url  = $request->ical_import_url;

        if(!empty($id) and $id == "-1"){
            $row->parent_id = $hotel_id;
        }

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if($id > 0 ){
                return redirect()->back()->with('success',  __('Room updated') );
            }else{
                return redirect(route('hotel.vendor.room.edit',['hotel_id'=>$hotel_id,'id'=>$row->id]))->with('success', __('Room created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->roomTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->roomTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->roomTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function delete($hotel_id,$id )
    {
        $this->checkPermission('hotel_delete');
        $user_id = Auth::id();
        $query = $this->roomClass::where("parent_id", $hotel_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->delete();
        }
        return redirect()->back()->with('success', __('Delete room success!'));
    }

    public function bulkEdit(Request $request , $hotel_id , $id)
    {
        $this->checkPermission('hotel_update');
        $action = $request->input('action');
        $user_id = Auth::id();
        $query = $this->roomClass::where("parent_id", $hotel_id)->where("id", $id)->first();
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
}