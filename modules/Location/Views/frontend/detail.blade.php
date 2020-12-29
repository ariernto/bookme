@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/location/css/location.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo_detail_location">
        @include('Location::frontend.layouts.details.location-banner')
        <div class="bravo_content">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-12 col-lg-8">
                        <h1 class="title-location">{{$translation->name}}</h1>
                        @include('Location::frontend.layouts.details.location-overview')
                    </div>
                    <div class="col-md-12 col-lg-4">
                        @if($row->image_id)
                            <div class="g-thumbnail m-3">
                                <img data-src="<?php echo $row->getImageUrl() ?>" class="img-fluid lazy" alt="{{$translation->name}}">
                            </div>
                        @endif
                    </div>
                </div>
                @php $types = get_bookable_services() @endphp
                @if(!empty($types))
                    <div class="g-location-module py-5 border-top border-bottom">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <h3>{{__("Explore the place")}}</h3>
                            </div>
                            <div class="col-12 col-lg-7">
                                <ul class="location-module-nav nav nav-pills justify-content-lg-end">
                                    @php $i = 0 @endphp
                                    @foreach($types as $type=>$moduleClass)
                                        @php
                                        if(!$moduleClass::isEnable()) continue;
                                        $moduleInst = new $moduleClass();
                                        $data[$type] = $moduleInst->select($moduleInst::getTableName().'.*')
                                        ->join('bravo_locations', function ($join) use ($row,$moduleInst) {
                                            $join->on('bravo_locations.id', '=', $moduleInst::getTableName().'.location_id')
                                                ->where('bravo_locations._lft', '>=', $row->_lft)
                                                ->where('bravo_locations._rgt', '<=', $row->_rgt);
                                        })
                                        ->where($moduleInst::getTableName().'.status','publish')->with('location')->take(8)->get();
                                        @endphp
                                        @if($data[$type]->count()>0)
                                            <li>
                                                <a class="{{$i==0?'active':""}}" href="#module-{{$type}}" data-toggle="tab">{{call_user_func([$moduleClass,'getModelName'])}}</a>
                                            </li>
                                            @php $i++ @endphp
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content clearfix py-5">
                            @php $i=0 @endphp
                            @foreach($types as $type=>$moduleClass)
                                @php  if(!$moduleClass::isEnable()) continue; @endphp
                                @php $view = ucfirst($type).'::frontend.blocks.list-'.$type.'.index' @endphp
                                @if(view()->exists($view))
                                    @if($data[$type]->count()>0)
                                        <div class="tab-pane {{$i==0?'active':""}}" id="module-{{$type}}">
                                            @include($view,['title'=>"",'style_list'=>'normal','desc'=>'','rows'=> $data[$type]])
                                            <p class="text-center"><a class="btn btn-primary btn-search" href="{{$row->getLinkForPageSearch($type)}}">{{__('View More')}}</a></p>
                                        </div>
                                        @php $i++ @endphp
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                @endif
                <div class="row">
                    <div class="col-12">
                        <h3 class="py-5">{{__("The City Maps")}}</h3>
                    </div>
                </div>
            </div>
            @include('Location::frontend.layouts.details.location-map')
            <div class="container">
                @include('Location::frontend.layouts.details.location-trip-idea')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                }
            });
            @endif
        })
    </script>

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
@endsection
