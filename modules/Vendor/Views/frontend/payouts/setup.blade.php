@php
$vendor_payout_methods = json_decode(setting_item('vendor_payout_methods'));
if(!is_array($vendor_payout_methods)) return;

$vendor_payout_methods = array_values(\Illuminate\Support\Arr::sort($vendor_payout_methods, function ($value) {
    return $value->order ?? 0;
}));

$payout_accounts = $currentUser->payout_accounts;
@endphp
<h4>{{__('Setup your payment accounts')}}</h4>
<div class="">
    <a href="#vendor_payout_accounts" data-toggle="modal" class="btn btn-primary btn-sm">{{__("Setup accounts")}}</a>
</div>
<br>
<p><i>{{__("To create payout request, please setup your payment account first")}}</i></p>

<div class="modal bravo-form" tabindex="-1" role="dialog" id="vendor_payout_accounts">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Setup payout accounts")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__("Method")}}</th>
                            <th>{{__("Your account")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendor_payout_methods as $k=>$method)
                            @php ($method_id = $method->id)
                            <tr>
                                <td>#{{$k+1}}</td>
                                <td>
                                    <span class="method-name"><strong>{{$method->name}}</strong></span>
                                    <div class="method-desc">{!! clean($method->desc) !!}</div>
                                </td>
                                <td>
                                    <textarea name="payout_accounts[{{$method->id}}]" class="form-control" cols="30" rows="3" placeholder="{{__("Your account info")}}">{{$payout_accounts->$method_id ?? ''}}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="message_box alert d-none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="button" class="btn btn-success " onclick="vendorPayout.saveAccounts(this)">{{__('Save changes')}}
                    <i class="fa fa-spinner"></i>
                </button>
            </div>
        </div>
    </div>
</div>
