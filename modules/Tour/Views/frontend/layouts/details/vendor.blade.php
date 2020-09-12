<?php
//if(!setting_item('tour_enable_inbox')) return;
$vendor = $row->author;
?>
@if(!empty($vendor->id))
<div class="owner-info widget-box">
    <div class="media">
        <div class="media-left">
            <a href="{{route('user.profile',['id'=>$vendor->user_name ?? $vendor->id])}}" target="_blank" class="avatar-cover" style="background-image: url('{{$vendor->getAvatarUrl()}}')" >
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a class="author-link" href="{{route('user.profile',['id'=>$vendor->user_name ?? $vendor->id])}}" target="_blank">{{$vendor->getDisplayName()}}</a>
                @if($vendor->is_verified)
                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-vefified-1.svg')}}" title="{{__("Verified")}}" alt="{{__("Verified")}}">
                @else
                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-not-vefified-1.svg')}}" title="{{__("Not verified")}}" alt="{{__("Verified")}}">
                @endif
            </h4>
            <p>{{ __("Member Since :time",["time"=> date("M Y",strtotime($vendor->created_at))]) }}</p>
            @if((!Auth::id() or Auth::id() != $row->create_user ) and setting_item('inbox_enable'))
                <a class="btn bc_start_chat" href="{{route('user.chat',['user_id'=>$row->create_user])}}" ><i class="icon ion-ios-chatboxes"></i> {{__('Message host')}}</a>
            @endif
        </div>
    </div>
</div>
@endif
