<?php
namespace Modules\Vendor\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Location\Models\Location;
use Modules\Vendor\Events\PayoutRequestEvent;
use Modules\Vendor\Models\VendorPayout;

class PayoutController extends AdminController
{
    /**
     * @var VendorPayout
     */
    protected $vendorPayoutClass;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/vendor');
        $this->vendorPayoutClass = VendorPayout::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('vendor_payout_view');

        $query = $this->vendorPayoutClass::query() ;
        $query->orderBy('id', 'desc');

        if($request->query('s'))
        {
            $query->where('id',$request->query('s'));
        }
        if($request->query('vendor_id'))
        {
            $query->where('vendor_id',$request->query('vendor_id'));
        }

        $data = [
            'rows'               => $query->with(['vendor'])->paginate(20),
            'page_title'=>__("Payout Management"),
            'breadcrumbs'        => [
                [
                    'name'  => __('Payout Management'),
                    'class' => 'active'
                ],
            ],
            'all_statuses'=>$this->vendorPayoutClass::getAllStatuses()
        ];
        return view('Vendor::admin.payouts.index', $data);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('vendor_payout_manage');

        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return $this->sendError(__('No items selected!'));
        }
        if (empty($action)) {
            return $this->sendError(__('Please select an action!'));
        }

        $all_statuses = $this->vendorPayoutClass::getAllStatuses();

        switch ($action){
            case "delete":
                foreach ($ids as $id) {
                    $query = $this->vendorPayoutClass::find($id);
                    if(!empty($query)){
                        event(new PayoutRequestEvent('delete',$query));
                        $query->delete();
                    }
                }
                return $this->sendSuccess(__('Deleted success!'));
                break;
            default:
                // Change status
                if(!array_key_exists($action,$all_statuses)){
                    abort(404);
                }
                foreach ($ids as $id) {
                    $payout = $this->vendorPayoutClass::find($id);
                    if($payout){
                        $payout->status = $action;
                        if(\request()->input('pay_date'))
                        {
                            $payout->pay_date = $request->input('pay_date');
                        }
                        if(\request()->input('note_to_vendor'))
                        {
                            $payout->note_to_vendor = $request->input('note_to_vendor');
                        }

                        $payout->save();

                        if($action == 'rejected'){
                            event(new PayoutRequestEvent('reject',$payout));
                        }else{
                            event(new PayoutRequestEvent('update',$payout));
                        }
                    }
                }
                return $this->sendSuccess( __('Update success!'));
                break;
        }
    }
}
