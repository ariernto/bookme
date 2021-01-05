@if($translation->trip_ideas)
    <div class="g-trip-ideas">
        <h3 class="py-5">{{__("Trip Ideas")}}</h3>
        @if(!empty($translation->trip_ideas))
            @php if(!is_array($translation->trip_ideas)) $translation->trip_ideas = json_decode($translation->trip_ideas); @endphp
            @foreach($translation->trip_ideas as $key=>$trip_idea)
                <div class="trip-idea mb-5">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 pr-lg-5 pb-5">
                            <p class="trip-idea-category">{{__('FEATURED ARTICLE')}}</p>
                            <h2 class="pb-3">{{@$trip_idea['title']}}</h2>
                            <div class="description pb-3"><p>{{$trip_idea['content']}}</p></div>
                            @if($trip_idea['link'])
                                <p><a href="{{$trip_idea['link']}}" target="_blank" class="read-more">{{__('Read More')}}</a></p>
                                @endif
                        </div>
                        <div class="col-md-12 col-lg-4 pb-5">
                            @if($trip_idea['image_id'])
                                {!! get_image_tag($trip_idea['image_id'],'full',['class'=>'img-fluid'])!!}
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endif
