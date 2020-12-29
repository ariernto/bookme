<?php
//if(!setting_item('tour_enable_inbox')) return;
$vendor = $row->author;
?>
<div class="owner-info widget-box">
    <div class="media">
        <div class="media-left">
            <a href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank" >
                @if($avatar_url = $vendor->getAvatarUrl())
                    <img class="avatar avatar-96 photo origin round" src="{{$avatar_url}}" alt="{{$vendor->getDisplayName()}}">
                @else
                    <span class="avatar-text">{{ucfirst($vendor->getDisplayName()[0])}}</span>
                @endif
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a class="author-link" href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank">{{$vendor->getDisplayName()}}</a>
                @if($vendor->is_verified)
                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-vefified-1.svg')}}" title="{{__("Verified")}}" alt="{{__("Verified")}}">
                @else
                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-not-vefified-1.svg')}}" title="{{__("Not verified")}}" alt="{{__("Verified")}}">
                @endif
            </h4>
            <p>{{ __("Member Since :time",["time"=> date("M Y",strtotime($vendor->created_at))]) }}</p>
            @if((!Auth::id() or Auth::id() != $row->create_user ) and setting_item('inbox_enable'))
                <span class="bc_start_chat btn" data-id="{{$row->id}}" data-type="{{$row->type}}"><i class="icon ion-ios-chatboxes"></i> {{__('Message host')}}</span>
            @endif
        </div>
    </div>
</div>
