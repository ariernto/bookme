<div class="container">
    <div class="bravo-list-hotel layout_{{$style_list}}">
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
                            @include('Hotel::frontend.layouts.search.loop-grid')
                        </div>
                    @endforeach
                </div>
            @endif
            @if($style_list === "carousel")
                <div class="owl-carousel">
                    @foreach($rows as $row)
                        @include('Hotel::frontend.layouts.search.loop-grid')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>