@if(!empty($list_item))
    <div class="bravo-offer">
        <div class="container">
            <div class="row">
                @foreach($list_item as $key=>$item)
                    @php $size = 3 ; if($key == 0) $size = 6; @endphp
                    <div class="col-lg-{{$size}}">
                        <div class="item">
                            @if(!empty($item['featured_text']))
                                <div class="featured-text">{{$item['featured_text']}}</div>
                            @endif
                            @if(!empty($item['featured_icon']))
                                <div class="featured-icon"><i class="{{$item['featured_icon']}}"></i></div>
                            @endif
                            <h2 class="item-title">{{$item['title']}}</h2>
                            <p class="item-sub-title">{!! $item['desc'] !!}</p>
                            <a href="{{$item['link_more']}}" class="btn btn-default">{{$item['link_title']}}</a>
                            <div class="img-cover" style="background: url('{{ get_file_url($item['background_image'],'full') ?? "" }}')"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif