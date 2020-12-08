<h4>{{__('Create request')}}</h4>
@if($available_payout_amount)
    <div class="total-amount-payable h4 text-primary">
        <strong>{{__("Balance: ")}}</strong>
        <strong>{{format_money($available_payout_amount)}}</strong>
    </div>
    <br>
    <div class="">
        <a href="#vendor_create_request" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{__("Create request")}}</a>
    </div>
@else
    <div class="alert alert-warning">{{__("Your balance is zero")}}</div>
@endif

<div class="modal bravo-form" tabindex="-1" role="dialog" id="vendor_create_request">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Create payout request")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form class="" novalidate onsubmit="return false" >
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{__("Available for payout")}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="{{format_money($available_payout_amount)}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{__("Amount")}} <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" required max="{{$available_payout_amount}}" class="form-control" name="amount" value="{{$available_payout_amount}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{__("Method")}} <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select required class="form-control" name="payout_method">
                                <option value="">{{__('-- Please select --')}}</option>
                                @foreach($currentUser->available_payout_methods as $id=>$method)
                                    <option value="{{$id}}">{{$method->name}} @if(!empty($method->min)) ({{__('Minimum: :amount',['amount'=>format_money($method->min)])}}) @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{__("Note to admin")}}</label>
                        <div class="col-sm-9">
                            <textarea name="note_to_admin" class="form-control" cols="30" rows="10" ></textarea>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="button" class="btn btn-success " onclick="vendorPayout.sendRequest(this)">{{__('Send request')}}
                    <i class="fa fa-spinner fa-spin fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
</div>