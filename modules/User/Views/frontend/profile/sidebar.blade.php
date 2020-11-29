<div class="profile-summary mb-2">
    <div class="profile-avatar">
        @if($avatar = $user->getAvatarUrl())
            <div class="avatar-img">
                <img src="{{$avatar}}" alt="{{$user->getDisplayName()}}">
            </div>
        @else
            <span class="avatar-text">{{$user->getDisplayName()[0]}}</span>
        @endif
    </div>
    <div class="text-center mb-1"><span class="role-name  badge badge-primary">{{$user->role_name}}</span></div>
    <h3 class="display-name">{{$user->getDisplayName()}}
        @if($user->is_verified)
            <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-vefified-1.svg')}}" title="{{__("Verified")}}" alt="ico-vefified-1">
        @else
            <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-not-vefified-1.svg')}}" title="{{__("Not verified")}}" alt="ico-vefified-1">
        @endif
    </h3>

    <p class="profile-since">{{ __("Member Since :time",["time"=> date("M Y",strtotime($user->created_at))]) }}</p>

    @if($user->hasPermissionTo('dashboard_vendor_access'))<hr>
    <ul class="meta-info style2">
        <li class="is_vendor">
            <i class="icon ion-ios-ribbon"></i>
            {{__('Vendor')}}
        </li>
        <li class="review_count">
            <i class="icon ion-ios-thumbs-up"></i>
            @if($user->review_count <= 1)
                {{__(':count review',['count'=>$user->review_count])}}
            @else
                {{__(':count reviews',['count'=>$user->review_count])}}
            @endif
        </li>
    </ul>
    @endif
    @if(setting_item('vendor_show_email') or setting_item('vendor_show_phone'))
    <hr>
    <ul class="meta-info style1">
        @if(setting_item('vendor_show_email'))
        <li class="user_email">
            <span class="label">{{__('Email:')}}</span>
            <span class="val">{{$user->email}}</span>
        </li>
        @endif

        @if(setting_item('vendor_show_phone'))
        <li class="user_phone">
            <span class="label">{{__('Phone:')}}</span>
            <span class="val">{{$user->phone}}</span>
        </li>
        @endif
    </ul>
    @endif
    <hr>
    <h4 class="summary-title">{{__('Verifications')}}</h4>
    <ul class="verification-lists">
        @if(!empty($user->verification_fields))
            @foreach($user->verification_fields as $field)
                <li> <span class="left-icon">
                     @if($field['is_verified'])
                            <img src="{{asset('icon/success.svg')}}" alt="success">
                        @else
                            <img src="{{asset('icon/x.svg')}}" alt="success">
                        @endif
                    </span> <span>{{$field['name']}}</span>

                </li>
            @endforeach
        @endif
    </ul>
</div>
