@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
    @endif
    <div class="header-thumb">
        @if($row->discount_percent)
            <div class="sale_info">{{$row->discount_percent}}</div>
        @endif
        @if($row->image_url)
            @if(!empty($disable_lazyload))
                <img src="{{$row->image_url}}" class="img-responsive" alt="{{$location->name ?? ''}}">
            @else
                {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
            @endif
        @endif
        <a class="st-btn st-btn-primary tour-book-now" href="{{$row->getDetailUrl()}}">{{__("Book now")}}</a>
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="caption clear">
        <div class="title-address">
            <h3 class="title"><a href="{{$row->getDetailUrl()}}"> {{$translation->title}} </a></h3>
            <p class="duration">
                <span>
                    @if($row->duration > 1)
                        {{ __(":number hours",["number"=>$row->duration ]) }}
                    @else
                        {{ __(":number hour",["number"=>$row->duration ]) }}
                    @endif
                </span>
                @if(!empty($row->location->name))
                    -
                    <i>
                        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                        {{$location->name ?? ''}}
                    </i>
                @endif
            </p>
        </div>
        <div class="g-price">
            <div class="price">
                <span class="onsale">{{ $row->display_sale_price }}</span>
                <span class="text-price">{{ $row->display_price }}</span>
            </div>
        </div>
    </div>
</div>