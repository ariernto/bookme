@php

    $translation = $row->translateOrOrigin(app()->getLocale());

@endphp

<div class="item-activity {{$wrap_class ?? ''}}">

    @if($row->is_featured == "1")

        <div class="featured">

            {{__("Featured")}}

        </div>

    @endif

    <div class="thumb-image">

        @if($row->discount_percent)

            <div class="sale_info">{{$row->discount_percent}}</div>

        @endif

        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">

            @if($row->image_url)

                @if(!empty($disable_lazyload))

                    <img src="{{$row->image_url}}" class="img-responsive" alt="{{$location->name ?? ''}}">

                @else

                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}

                @endif

            @endif

        </a>

        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">

            <i class="fa fa-heart"></i>

        </div>

    </div>

    <div class="info">

        <div class="g-price row">

            <div class="prefix browncolor col-lg-6 col-md-6">

                @if(!empty($row->location->name))

                    @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp

                    {{$location->name ?? ''}}

                @endif

            </div>

            <div class="price browncolor righttext col-lg-6 col-md-6">

                {{ $row->display_price }}

            </div>

        </div>

    </div>

    <div class="item-title">

        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">

            {{$translation->title}}

        </a>

    </div>
    <hr class="hrcla" />
    <div class="info">
        <div class="row smallcha">
            <div class="col-lg-4 col-md-4 col-sm-4 p-1 leftbotposit">
                <i class="fa fa-calendar"></i>
                ALL YEAR
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 p-1">
                <i class="icofont-wall-clock"></i>
                3 HOURS
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 p-1 leftbotposit">
                <div class="starcla">
                    <i class="fa fa-star-o smallstarcol"></i>
                    <i class="fa fa-star-o smallstarcol"></i>
                    <i class="fa fa-star-o smallstarcol"></i>
                    <i class="fa fa-star-o smallstarcol"></i>
                    <i class="fa fa-star-o smallstarcol"></i>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
    .browncolor {
        color: #c29d59 !important;
    }
    .righttext {
        text-align: right !important;
    }
</style>
