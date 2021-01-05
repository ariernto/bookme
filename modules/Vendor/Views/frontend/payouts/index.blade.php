@extends('layouts.user')

@section('content')
    @php
        $vendor_payout_methods = json_decode(setting_item('vendor_payout_methods'));
        if(!is_array($vendor_payout_methods)) $vendor_payout_methods = [];
        $payout_accounts = $currentUser->payout_accounts;
    @endphp
    <h2 class="title-bar">
        {{__("Vendor Payouts")}}
    </h2>
    @include('admin.message')

    <div class="booking-history-manager">
        @if(!empty($vendor_payout_methods))
            <div class="row">
                @if(!empty($payout_accounts))
                <div class="col-md-6">
                    @include("Vendor::frontend.payouts.request")
                </div>
                @endif
                <div class="col-md-6">
                    @include("Vendor::frontend.payouts.setup")
                </div>
            </div>
        @else
            <div class="alert alert-warning">{{__("No payout methods available. Please contact administrator")}}</div>
        @endif
        @if(count($payouts))
        <hr>
        <h4>{{__("Payout history")}}</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-booking-history">
                <thead>
                    <tr>
                        <th width="2%">{{__("#")}}</th>
                        <th>{{__("Amount")}}</th>
                        <th>{{__("Payout Method")}}</th>
                        <th>{{__("Date Request")}}</th>
                        <th>{{__("Notes")}}</th>
                        <th>{{__("Date Processed")}}</th>
                        <th>{{__("Status")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payouts as $payout)
                        <tr>
                            <td>#{{$payout->id}}</td>
                            <th>{{format_money($payout->amount)}}</th>
                            <td>
                                {{__(':name to :info',['name'=>$payout->payout_method_name,'info'=>$payout->account_info])}}
                            </td>
                            <td>{{display_date($payout->created_at)}}</td>
                            <td>
                                @if($payout->note_to_admin)
                                    <label ><strong>{{__("To admin:")}}</strong></label>
                                    <br>
                                    <div>{{$payout->note_to_admin}}</div>
                                @endif
                                @if($payout->note_to_vendor)
                                    <label ><strong>{{__("To vendor:")}}</strong></label>
                                    <br>
                                    <div>{{$payout->note_to_vendor}}</div>
                                @endif
                            </td>
                            <td>{{$payout->pay_date ? display_date($payout->pay_date) : ''}}</td>
                            <td>{{$payout->status_text}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bravo-pagination">
            {{$payouts->appends(request()->query())->links()}}
        </div>
        @endif
    </div>
@endsection