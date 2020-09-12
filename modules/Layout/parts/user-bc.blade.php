<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', \Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', \Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
@if(!empty($breadcrumbs))
<div class="breadcrumb-page-bar" aria-label="breadcrumb">
    <ul class="page-breadcrumb">
        <li class="">
            <a href="{{url('/')}}"><i class='fa fa-home'></i> {{__('Home')}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        @foreach($breadcrumbs as $breadcrumb)
            <li class=" {{$breadcrumb['class'] ?? ''}}">
                @if(!empty($breadcrumb['url']))
                    <a href="{{ $breadcrumb['url'] }}">{{$breadcrumb['name']}}</a>
                    <i class="fa fa-angle-right"></i>
                @else
                    {{$breadcrumb['name']}}
                @endif
            </li>
        @endforeach
    </ul>
    <div class="dropdown dropdown-notifications float-right" style="min-width: 0">
        <a data-toggle="dropdown" class="user-dropdown d-flex align-items-center" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell m-1 p-1"></i>
            <span class="badge badge-danger notification-icon">{{$countUnread}}</span>
        </a>
        <div class="dropdown-menu overflow-auto notify-items dropdown-container dropdown-menu-right dropdown-large" aria-labelledby="dropdownMenuButton">
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
                                    <a class="{{$class}}" data-id="{{$idNotification}}" href="{{$link}}">{!! $title !!}</a>
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
        </div>
    </div>
    <div class="bravo-more-menu-user">
        <i class="icofont-settings"></i>
    </div>
</div>
@endif
