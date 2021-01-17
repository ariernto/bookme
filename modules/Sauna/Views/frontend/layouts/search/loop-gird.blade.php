@php

    $translation = $row->translateOrOrigin(app()->getLocale());

@endphp

<div class="item-loop {{$wrap_class ?? ''}}">

    @if($row->is_featured == "1")

        <div class="featured">

            {{__("Featured")}}

        </div>

    @endif

    <div class="thumb-image ">

        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">

            @if($row->image_url)

                @if(!empty($disable_lazyload))

                    <img src="{{$row->image_url}}" class="img-responsive" alt="">

                @else

                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}

                @endif

            @endif

        </a>

        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">

            <i class="fa fa-heart-o"></i>

        </div>

        @if($row->discount_percent)

            <div class="sale_info">{{$row->discount_percent}}</div>

        @endif

    </div>

    <div class="info">

        <div class="g-price row">

            <div class="prefix col-lg-6 col-md-6">

                @if(!empty($row->location->name))

                    @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp

                    {{$location->name ?? ''}}

                @endif

            </div>

            <div class="price col-lg-6 col-md-6">

                <span class="onsale">{{ $row->display_sale_price }}</span>

                <div class="text-price">{{ $row->display_price }}</div>

            </div>

        </div>

    </div>

    <div class="item-title">

        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">

            @if($row->is_instant)

                <i class="fa fa-bolt d-none"></i>

            @endif

            {{$translation->title}}

        </a>

    </div>

    @if(setting_item('space_enable_review'))

    <?php

    $reviewData = $row->getScoreReview();

    $score_total = $reviewData['score_total'];

    ?>

        <div class="service-review">

            <span class="rate">

                @if($reviewData['total_review'] > 0) {{$score_total}}/5 @endif <span class="rate-text">{{$reviewData['review_text']}}</span>

            </span>

            <span class="review">

             @if($reviewData['total_review'] > 1)

                    {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}

                @else

                    {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}

                @endif

            </span>

        </div>

    @endif

    @if(!empty($time = $row->start_time))

        <div class="start-time">

            {{ __("Start Time: :time",['time'=>$time]) }}

        </div>

    @endif

    <div class="info">

        <div class="duration">

            {{duration_format($row->duration,true)}}

        </div>

    </div>

</div>
