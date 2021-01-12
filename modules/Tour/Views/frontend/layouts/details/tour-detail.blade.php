<div class="g-header">
    <div class="left">
        <h1>{{$translation->title}}</h1>
        <div class="onerow">
            @if($translation->address)
                <p class="address"><i class="fa fa-map-marker"></i>
                    {{$translation->address}}
                </p>
            @endif
            <div class="starreview">
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <i class="fa fa-star starcol"></i>
                <span class="review">
                    15 Reviews
                </span>
            </div>
        </div>
    </div>
</div>
@if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name))
    <div class="g-tour-feature">
    <div class="row">
        @if($row->duration)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-wall-clock"></i>
                    </div>
                    <div class="info">
                        <p class="value">
                            {{duration_format($row->duration,true)}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if($row->max_people)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-travelling"></i>
                    </div>
                    <div class="info">
                        <p class="value">
                            @if($row->max_people > 1)
                                {{ __(":number persons",array('number'=>$row->max_people)) }}
                            @else
                                {{ __(":number person",array('number'=>$row->max_people)) }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($row->category_tour->name))
            @php $cat =  $row->category_tour->translateOrOrigin(app()->getLocale()) @endphp
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-beach"></i>
                    </div>
                    <div class="info">
                        <p class="value">
                            {{$cat->name ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($row->location->name))
                @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <p class="value">
                            {{$location->name ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endif
@if($row->getGallery())
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            @foreach($row->getGallery() as $key=>$item)
                <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}" data-alt="{{ __("Gallery") }}"></a>
            @endforeach
        </div>
    </div>
@endif
<div class="g-overview">
    <h3>{{__("Overview")}}</h3>
    <div class="description">
        The colorful flamingos welcome you as soon as you enter the grounds of the Honolulu Zoo. Nearby, over 160 other species of tropical birds also show off their bright plumage. Continue on for close encounters with impressive giant reptiles such as Komodo dragons, crocodiles and iguanas, before visiting the giraffes, meerkats, cheetahs and aardvarks
       <br/><br/>
       The 42-acre (16-hectare) grounds of the Honolulu Zoo are divided into three main areas: the Tropical Forests, the Pacific Islands and the African Savannah. Within these areas you will see over 250 different mammal, reptile and bird species in areas designed to closely replicate their natural habitats.
    </div>
</div>
<div class="g-overview">
    <h4>{{__("Additional information:")}}</h4>
    <div class="description">
        This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.
    </div>
</div>
<div class="g-overview">
    <h4>{{__("Dress Code:")}}</h4>
    <div class="description">
        Casual. Comfortable athletic clothing. hiking shoes, hat and warm jacket.
    </div>
</div>

@include('Tour::frontend.layouts.details.tour-faqs')

@if($row->map_lat && $row->map_lng)
<div class="g-location">
    <div class="location-title">
        <h3>{{__("Tour Location")}}</h3>
        @if($translation->address)
            <div class="address">
                <i class="icofont-location-arrow"></i>
                {{$translation->address}}
            </div>
        @endif
    </div>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
@endif

