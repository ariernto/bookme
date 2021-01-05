@if($list_item)
    <div class="bravo-featured-item {{$style ?? ''}}">
        <div class="container">
            <div class="row">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="col-md-4">
                        <div class="featured-item">
                            <div class="image">
                                @if(!empty($style) and $style == 'style2')
                                    <span class="number-circle">{{$k+1}}</span>
                                @else
                                    <img src="{{$image_url}}" class="img-fluid" alt="{{$item['title']}}">
                                @endif
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    {{$item['title']}}
                                </h3>
                                <div class="desc">{!! clean($item['sub_title']) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
