@if($meta = $row->meta)
    @if($meta->enable_open_hours)
        @php $open_hours = $meta->open_hours @endphp
        @php $n = date('N') @endphp
        <div class="owner-info widget-box" style="margin-top: 20px;">
            @for($i = 1 ; $i <=7 ; $i++)
                <div class="open-hour-item @if($n == $i) current @endif">
                    <strong>
                        @switch($i)
                            @case(1)
                            {{__('Monday')}}
                            @break
                            @case(2)
                            {{__('Tuesday')}}
                            @break
                            @case (3)
                            {{__('Wednesday')}}
                            @break
                            @case (4)
                            {{__('Thursday')}}
                            @break
                            @case (5)
                            {{__('Friday')}}
                            @break
                            @case (6)
                            {{__('Saturday')}}
                            @break
                            @case (7)
                            {{__('Sunday')}}
                            @break
                        @endswitch
                    </strong>
                    <span class="open-hour-detail">
                        @if(empty($open_hours[$i]['enable']))
                            <span class="text text-danger">{{__("Closed")}}</span>
                        @else
                            {{$open_hours[$i]['from']}} - {{$open_hours[$i]['to']}}
                        @endif
                    </span>
                </div>
            @endfor
        </div>
    @endif
@endif
