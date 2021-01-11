@php

    $translation = $row->translateOrOrigin(app()->getLocale());

@endphp

<div class="item-tour {{$wrap_class ?? ''}}">
    <div class="thumb-image">
        <img src="{{$row->image_url}}" class="img-responsive" alt="{{$location->name ?? ''}}">
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart-o whiteheart"></i>
        </div>
        <div class="center">
            <button class="btn dangerbtn">Book now</button>
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
                    <i class="fa fa-star smallstarcol"></i>
                    <i class="fa fa-star smallstarcol"></i>
                    <i class="fa fa-star smallstarcol"></i>
                    <i class="fa fa-star smallstarcol"></i>
                    <i class="fa fa-star smallstarcol"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.center {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  .starcla {
      position: absolute;
      right: 22px !important;
  }

  .dangerbtn {
      background: red !important;
      color: white !important;
  }
    .center {
        display: none;
    }

    img:hover .center {
        display: block;
    }
</style>
