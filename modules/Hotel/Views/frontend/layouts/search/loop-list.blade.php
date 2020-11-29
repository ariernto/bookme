@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item-loop-list {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
    @endif
    <div class="thumb-image">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]) !!}
                @endif
            @endif
        </a>
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="g-info">
        @if($row->star_rate)
            <div class="star-rate">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        @for ($star = 1 ;$star <= $row->star_rate ; $star++)
                            <li><i class="fa fa-star"></i></li>
                        @endfor
                    </ul>
                </div>
            </div>
        @endif
        <div class="item-title">
            <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                @if($row->is_instant)
                    <i class="fa fa-bolt d-none"></i>
                @endif
                {{$translation->title}}
            </a>
        </div>
        @if(!empty($attribute = $row->getAttributeInListingPage()))
            @php
                $translate_attribute =  $attribute->translateOrOrigin(app()->getLocale());
                $termsByAttribute = $row->termsByAttributeInListingPage
            @endphp
            <div class="terms">
                <div class="g-attributes">
                    <span class="attr-title"><i class="icofont-medal"></i> {{$translate_attribute->name ?? ""}}: </span>
                    @foreach($termsByAttribute as $term )
                        @php $translate_term = $term->translateOrOrigin(app()->getLocale()) @endphp
                        <span class="item {{$term->slug}} term-{{$term->id}}">{{$translate_term->name}}</span>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="location">
            @if(!empty($row->location->name))
                @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                <i class="icofont-paper-plane"></i>
                {{$location->name ?? ''}}
            @endif
        </div>
    </div>
    <div class="g-rate-price">
        @if(setting_item('hotel_enable_review'))
            @php  $reviewData = $row->getScoreReview(); @endphp
            <div class="service-review-pc">
                <div class="head">
                    <div class="left">
                        <span class="head-rating">{{$reviewData['review_text']}}</span>
                        <span class="text-rating">{{__(":number reviews",['number'=>$reviewData['total_review']])}}</span>
                    </div>
                    <div class="score">
                        {{$reviewData['score_total']}}<span>/5</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text">{{__("from")}}</span>
            </div>
            <div class="price">
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/night")}}</span></span>
            </div>
            @if(!empty($reviewData['total_review']))
                <div class="text-review">
                    {{__(":number reviews",['number'=>$reviewData['total_review']])}}
                </div>
            @endif
        </div>
    </div>
</div>
