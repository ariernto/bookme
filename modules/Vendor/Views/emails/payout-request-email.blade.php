@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            @if($to == 'vendor')
                <h1>{{__("Hello :name",['name'=>$user->getDisplayName()])}}</h1>

                @if($action == 'insert')
                    <p>{{__('Your payout request has been submitted:')}}</p>
                @elseif($action ==  'update')
                    <p>{{__('Your payout request has been updated:')}}</p>
                @elseif($action ==  'reject')
                    <p>{{__('Your payout request has been rejected:')}}</p>
                @elseif($action ==  'delete')
                    <p>{{__('Your payout request has been deleted')}}</p>
                @endif

                @if(!in_array($action,['insert','delete']))
                    <ul>
                        <li><strong>{{__('Status:')}}</strong> <strong>{{$payout_request->status_text}}</strong></li>
                        @if($payout_request->pay_date)
                            <li><strong>{{__('Pay date:')}}</strong> <strong>{{display_date($payout_request->pay_date)}}</strong></li>
                        @endif
                        @if($payout_request->note_to_vendor)
                            <li><strong>{{__('Note to vendor:')}}</strong> <strong>{!! clean($payout_request->note_to_vendor) !!}</strong></li>
                        @endif
                    </ul>
                    <p>{{__('Payout information:')}}</p>
                @endif

                <ul>
                    <li><strong>{{__("Payout ID:")}}</strong> <strong>#{{$payout_request->id}}</strong></li>
                    <li><strong>{{__('Amount: ')}}</strong> <strong>{{format_money($payout_request->amount)}}</strong></li>
                    <li><strong>{{__('Payout method: ')}}</strong>
                        {{__(':name to :info',['name'=>$payout_request->payout_method_name,'info'=>$payout_request->account_info])}}
                    </li>
                    @if($payout_request->note_to_admin)
                    <li><strong>{{__('Note to admin: ')}}</strong>
                        {{$payout_request->note_to_admin}}
                    </li>
                    @endif
                    <li><strong>{{__('Created at: ')}}</strong>
                        {{display_datetime($payout_request->created_at)}}
                    </li>

                </ul>
                <p>{{__('You can check your payout request here:')}} <a class="btn btn-primary" target="_blank" href="{{route('vendor.payout.index')}}">{{__('View payouts')}}</a></p>

                <br>
            @else
                <h1>{{__("Hello administrator")}}</h1>

                @if($action == 'insert')
                    <p>{{__('A vendor has been submitted a payout request:')}}</p>
                @elseif($action ==  'update')
                    <p>{{__('A payout request has been updated:')}}</p>
                @elseif($action ==  'reject')
                    <p>{{__('A payout request has been rejected:')}}</p>
                @elseif($action ==  'delete')
                    <p>{{__('A payout request has been deleted')}}</p>
                @endif

                @if(!in_array($action,['insert','delete']))
                    <ul>
                        <li><strong>{{__('Status:')}}</strong> <strong>{{$payout_request->status_text}}</strong></li>
                        @if($payout_request->pay_date)
                            <li><strong>{{__('Pay date:')}}</strong> <strong>{{display_date($payout_request->pay_date)}}</strong></li>
                        @endif
                        @if($payout_request->note_to_vendor)
                        <li><strong>{{__('Note to vendor:')}}</strong> <strong>{!! clean($payout_request->note_to_vendor) !!}</strong></li>
                        @endif
                    </ul>
                    <p>{{__('Payout information:')}}</p>
                @endif

                <ul>
                    <li><strong>{{__("Payout ID:")}}</strong> <strong>#{{$payout_request->id}}</strong></li>
                    <li><strong>{{__('Vendor: ')}}</strong> <strong><a target="_blank" href="{{route('user.profile',['id'=>$payout_request->vendor_id])}}">{{$payout_request->vendor->getDisplayName()}}</a></strong></li>
                    <li><strong>{{__('Amount: ')}}</strong> <strong>{{format_money($payout_request->amount)}}</strong></li>
                    <li><strong>{{__('Payout method: ')}}</strong>
                        {{__(':name to :info',['name'=>$payout_request->payout_method_name,'info'=>$payout_request->account_info])}}
                    </li>
                    @if($payout_request->note_to_admin)
                    <li><strong>{{__('Note to admin: ')}}</strong>
                        {{$payout_request->note_to_admin}}
                    </li>
                    @endif
                    <li><strong>{{__('Created at: ')}}</strong>
                        {{display_datetime($payout_request->created_at)}}
                    </li>

                </ul>
                <p>{{__('You can check all payout request here:')}} <a class="btn btn-primary" target="_blank" href="{{route('vendor.admin.payout.index')}}">{{__('Manage payouts')}}</a></p>
                <br>
            @endif
            <p>{{__('Regards')}},<br>{{setting_item('site_title')}}</p>
        </div>
    </div>
@endsection
