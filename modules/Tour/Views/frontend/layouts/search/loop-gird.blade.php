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
        <div class="row smallcha">
            <div class="col-lg-4 col-md-6 col-sm-12 p-1">
                <i class="fa fa-calendar"></i>
                ALL YEAR
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-1">
                <i class="icofont-wall-clock"></i>
                3 HOURS
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-1">
                <i class="fa fa-star smallstarcol"></i>
                <i class="fa fa-star smallstarcol"></i>
                <i class="fa fa-star smallstarcol"></i>
                <i class="fa fa-star smallstarcol"></i>
                <i class="fa fa-star smallstarcol"></i>
            </div>
        </div>
    </div>
</div>

