<div class="container">
    <div class="bravo-list-event layout_{{$style_list}}">
        @if($title)
        <div class="title">
            {{$title}}
        </div>
        @endif
        @if($desc)
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        <div class="list-item">
            @if($style_list === "normal")
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-lg-{{$col ?? 3}} col-md-6">
                            @include('Event::frontend.layouts.search.loop-gird')
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
