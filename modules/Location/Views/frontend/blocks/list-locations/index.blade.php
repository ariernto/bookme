<div class="container">
    <div class="bravo-list-locations @if(!empty($layout)) {{ $layout }} @endif">
        <div class="title">
            {{$title}}
        </div>
        @if(!empty($desc))
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        @if(!empty($rows))
            <div class="list-item">
                <div class="row">
                    @foreach($rows as $key=>$row)
                        <?php
                        $size_col = 4;
                        if( !empty($layout) and (  $layout == "style_2" or $layout == "style_3" or $layout == "style_4" )){
                            $size_col = 4;
                        }else{
                            if($key == 0){
                                $size_col = 8;
                            }
                        }
                        ?>
                        <div class="col-lg-{{$size_col}} col-md-6">
                            @include('Location::frontend.blocks.list-locations.loop')
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>