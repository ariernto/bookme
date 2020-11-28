@if($translation->itinerary)
    <div class="g-itinerary">
        <h3> {{__("Itinerary")}} </h3>
        <div class="list-item owl-carousel">
            @foreach($translation->itinerary as $item)
                <div class="item" style="background-image: url('{{ !empty($item['image_id']) ? get_file_url($item['image_id'],"full") : "" }}')">
                    <div class="header">
                        <div class="item-title">{{$item['title']}}</div>
                        <div class="item-desc">{{$item['desc']}}</div>
                    </div>
                    <div class="body">
                        <div class="item-title">{{$item['title']}}</div>
                        <div class="item-desc">{{$item['desc']}}</div>
                        <div class="item-context">
                            {!! clean($item['content']) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
