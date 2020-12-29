@if(count($sauna_related) > 0)
    <div class="bravo-list-space-related">
        <h2>{{__("You might also like")}}</h2>
        <div class="row">
            @foreach($sauna_related as $k=>$item)
                <div class="col-md-3">
                    @include('Sauna::frontend.layouts.search.loop-gird',['row'=>$item,'include_param'=>0])
                </div>
            @endforeach
        </div>
    </div>
@endif
