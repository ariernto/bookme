<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
<div class="bravo_topbar">
    <div class="container">
        <div class="content">
            <div class="topbar-left">

                {!! setting_item_with_lang("topbar_left_text") !!}


            </div>
            <div class="topbar-right">
                <ul class="topbar-items">
                    @include('Core::frontend.currency-switcher')
                    @include('Language::frontend.switcher')
                @if(!Auth::id())
                        <li class="login-item">
                            <a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a>
                        </li>
                        <li class="signup-item">
                            <a href="#register" data-toggle="modal" data-target="#register" class="signup">{{__('Sign Up')}}</a>
                        </li>
                    @else
                        <li class="dropdown-notifications dropdown p-0">
                            <a href="#" data-toggle="dropdown" class="is_login">
                                <i class="fa fa-bell mr-2"></i>
                                <span class="badge badge-danger notification-icon">{{$countUnread}}</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu overflow-auto notify-items dropdown-container dropdown-menu-right dropdown-large">
                                <div class="dropdown-toolbar">
                                    <div class="dropdown-toolbar-actions">
                                        <a href="#" class="markAllAsRead">{{__('Mark all as read')}}</a>
                                    </div>
                                    <h3 class="dropdown-toolbar-title">{{__('Notifications')}} (<span class="notif-count">{{$countUnread}}</span>)</h3>
                                </div>
                                <ul class="dropdown-list-items p-0">
                                    @if(count($notifications)> 0)
                                        @foreach($notifications as $oneNotification)
                                            @php
                                                $active = $class = '';
                                                $data = json_decode($oneNotification['data']);

                                                $idNotification = @$data->id;
                                                $forAdmin = @$data->for_admin;
                                                $usingData = @$data->notification;

                                                $services = @$usingData->type;
                                                $idServices = @$usingData->id;
                                                $title = @$usingData->message;
                                                $name = @$usingData->name;
                                                $avatar = @$usingData->avatar;
                                                $link = @$usingData->link;

                                                if(empty($oneNotification->read_at)){
                                                    $class = 'markAsRead';
                                                    $active = 'active';
                                                }
                                            @endphp
                                            <li class="notification {{$active}}">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <div class="media-object">
                                                            @if($avatar)
                                                                <img class="image-responsive" src="{{$avatar}}" alt="{{$name}}">
                                                            @else
                                                                <span class="avatar-text">{{ucfirst($name[0])}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <a class="{{$class}} p-0" data-id="{{$idNotification}}" href="{{$link}}">{!! $title !!}</a>
                                                        <div class="notification-meta">
                                                            <small class="timestamp">{{format_interval($oneNotification->created_at)}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="{{route('core.notification.loadNotify')}}">{{__('View More')}}</a>
                                </div>
                            </ul>
                        </li>
                        <li class="login-item dropdown">
                            <a href="#" data-toggle="dropdown" class="login">{{__("Hi, :name",['name'=>Auth::user()->getDisplayName()])}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-user text-left">
                                @if(empty( setting_item('wallet_module_disable') ))
                                    <li class="credit_amount">
                                        <a href="{{route('user.wallet')}}"><i class="fa fa-money"></i> {{__("Credit: :amount",['amount'=>auth()->user()->balance])}}</a>
                                    </li>
                                @endif
                                @if(is_vendor())
                                <li class="menu-hr"><a href="{{route('vendor.dashboard')}}" class="menu-hr"><i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}</a></li>
                                @endif
                                <li class="@if(is_vendor()) menu-hr @endif">
                                    <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                                </li>
                                @if(setting_item('inbox_enable'))
                                <li class="menu-hr"><a href="{{route('user.chat')}}"><i class="fa fa-comments"></i> {{__("Messages")}}</a></li>
                                @endif
                                    <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                                <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                                @if(is_admin())
                                    <li class="menu-hr"><a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                                @endif
                                <li class="menu-hr">
                                    <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                                </li>
                            </ul>
                            <form id="logout-form-topbar" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
