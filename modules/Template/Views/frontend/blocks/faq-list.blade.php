<div class="bravo-faq-lists">
    <div class="container">
        <h2 class="title text-center mb40">{{$title ?? ''}}</h2>
        @if(!empty($list_item))
            <div class="row">
            @foreach($list_item as $item)
                <div class="col-md-6">
                    <div class="faq-item">
                        <h3><a><img class="alignnone wp-image-7754" src="{{asset('images/ico_quest.png')}}" alt="" width="35" height="35"></a>&nbsp; {{$item['title']}}</h3>
                        <p>
                            {!! clean($item['sub_title'],'html5-definitions') !!}
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        @endif
    </div>
</div>
