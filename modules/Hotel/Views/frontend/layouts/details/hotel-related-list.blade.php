@if(count($hotel_related) > 0)
    <div class="bravo-list-hotel-related-widget">
        <h3 class="heading">{{__("Related Hotel")}}</h3>
        <div class="list-item">
            @foreach($hotel_related as $k=>$item)
                @php
                    $translation_item = $item->translateOrOrigin(app()->getLocale());
                @endphp
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{$item->getDetailUrl(false)}}">
                                @if($item->image_url)
                                    @if(!empty($disable_lazyload))
                                        <img src="{{$item->image_url}}" class="img-responsive" alt="{{$translation_item->title}}">
                                    @else
                                        {!! get_image_tag($item->image_id,'thumb',['class'=>'img-responsive','alt'=>$translation_item->title]) !!}
                                    @endif
                                @endif
                            </a>
                        </div>
                        <div class="media-body">
                            @if($item->star_rate)
                                <div class="star-rate">
                                    @for ($star = 1 ;$star <= $item->star_rate ; $star++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            @endif
                            <h4 class="media-heading">
                                <a href="{{$item->getDetailUrl(false)}}">
                                    {{$translation_item->title}}
                                </a>
                            </h4>
                            <div class="price-wrapper">
                                {{__("from")}}
                                <span class="price">{{ $item->display_price }}</span>
                                <span class="unit">{{__("/night")}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif