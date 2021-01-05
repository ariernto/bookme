@if($list_item)
    <div class="bravo-how-it-works" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{get_file_url($background_image ?? "","full")}}') !important">
        <div class="container">
            <div class="title">
                {{$title}}
            </div>
            <div class="row">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="col-md-4">
                        <div class="featured-item">
                            <div class="image">
                                @if(!empty($style) and $style == 'style2')
                                    <span class="number-circle">{{$k+1}}</span>
                                @else
                                    <img src="{{$image_url}}" class="img-fluid">
                                @endif
                            </div>
                            <div class="content">
                                <h4 class="sub-title">
                                    {{$item['title']}}
                                </h4>
                                <div class="desc">{!! clean($item['sub_title']) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
