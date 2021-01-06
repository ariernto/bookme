<div class="row">
    <div class="col-lg-3 col-md-12">
        @include('Hotel::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h2 class="text">
                    @if($rows->total() > 1)
                        {{ __(":count hotels found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count hotel found",['count'=>$rows->total()]) }}
                    @endif
                </h2>
                <div class="control">
                    @include('Hotel::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            @php $layout = setting_item("hotel_layout_item_search",'list') @endphp
                            @if($layout == "list")
                                <div class="col-lg-12 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-list')
                                </div>
                            @else
                                <div class="col-lg-4 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-grid')
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Hotel not found")}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>