@php

    $translation = $row->translateOrOrigin(app()->getLocale());

@endphp

<div class="item-tour {{$wrap_class ?? ''}}">
    <div class="thumb-image">
        <img src="{{$row->image_url}}" class="img-responsive" alt="{{$location->name ?? ''}}">
        <div class="service-wishlist {{$row->isWishList()}} reposite" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart-o whiteheart"></i>
        </div>
    </div>
    <div class="location locatcolor">
        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
        {{$location->name ?? ''}}
        <p class="moneycha">365 €</p>
    </div>
    <div class="item-title">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            {{$translation->title}}
        </a>
    </div>
    <hr class="hrcla" />
    <div class="info">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-6">
                <i class="fa fa-calendar paddingicon"></i>
                ALL YEAR
                <i class="icofont-wall-clock paddingicon"></i>
                3 HOURS
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
            </div>
        </div>
    </div>
</div>

