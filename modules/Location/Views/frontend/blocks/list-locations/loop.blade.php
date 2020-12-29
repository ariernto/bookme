@php
    /**
    * @var $row \Modules\Location\Models\Location
    * @var $to_location_detail bool
    * @var $service_type string
    */
    $translation = $row->translateOrOrigin(app()->getLocale());
    $link_location = false;
    if(is_string($service_type)){
        $link_location = $row->getLinkForPageSearch($service_type);
    }
    if(is_array($service_type) and count($service_type) == 1){
        $link_location = $row->getLinkForPageSearch($service_type[0] ?? "");
    }
    if($to_location_detail){
        $link_location = $row->getDetailUrl();
    }
@endphp
<div class="destination-item @if(!$row->image_id) no-image  @endif">
    @if(!empty($link_location)) <a href="{{$link_location}}">  @endif
        <div class="image" @if($row->image_id) style="background: url({{$row->getImageUrl()}})" @endif >
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">{{$translation->name}}</h4>
                @if( !empty($layout) and ($layout == "style_1" or $layout == "style_3" or $layout == "style_4"))
                    @if(is_array($service_type))
                        <div class="desc">
                            @foreach($service_type as $type)
                                @php $count = $row->getDisplayNumberServiceInLocation($type) @endphp
                                @if(!empty($count))
                                    @if(empty($link_location))
                                        <a href="{{ $row->getLinkForPageSearch( $type ) }}" target="_blank">
                                            {{$count}}
                                        </a>
                                    @else
                                        <span>{{$count}}</span>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @else
                        @if(!empty($text_service = $row->getDisplayNumberServiceInLocation($service_type)))
                            <div class="desc">{{$text_service}}</div>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    @if(!empty($link_location)) </a> @endif
</div>
