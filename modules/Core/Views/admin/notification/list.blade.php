<div class="col-9">
    <div class="panel">
        <ul class="dropdown-list-items p-0">
            @if(count($rows)> 0)
                @foreach($rows as $oneNotification)
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
            @else
                <li class="notification">{{__("You don't have any notifications")}}</li>
            @endif
        </ul>

        <div class="d-flex justify-content-end">
            {{$rows->links()}}
        </div>
    </div>
</div>
