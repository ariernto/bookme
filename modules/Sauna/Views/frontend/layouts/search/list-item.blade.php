<div class="row">

    <div class="col-lg-3 col-md-12">

        @include('Sauna::frontend.layouts.search.filter-search')

    </div>

    <div class="col-lg-9 col-md-12">

        <div class="bravo-list-item">

            <div class="topbar-search">

                <h2 class="text">

                    @if($rows->total() > 1)

                        {{ __(":count saunas found",['count'=>$rows->total()]) }}

                    @else

                        {{ __(":count sauna found",['count'=>$rows->total()]) }}

                    @endif

                </h2>

                <div class="control">

                    @include('Sauna::frontend.layouts.search.orderby')

                </div>

            </div>

            <div class="list-item">

                <div class="row">

                    @if($rows->total() > 0)

                        @foreach($rows as $row)

                            <div class="col-lg-4 col-md-6">

                                @include('Sauna::frontend.layouts.search.loop-gird')

                            </div>

                        @endforeach

                    @else

                        <div class="col-lg-12">

                            {{__("Sauna not found")}}

                        </div>

                    @endif

                </div>

            </div>

            <div class="bravo-pagination">

                {{$rows->appends(request()->query())->links()}}

                @if($rows->total() > 0)

                    <span class="count-string">{{ __("Showing :from - :to of :total Saunas",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>

                @endif

            </div>

        </div>

    </div>

</div>
<style>
    @media (min-width: 1500px)
    {
        .maxwid {
            max-width: 1140px !important;
        }
    }
    @media (min-width: 992px)
    {
        .maxwid {
            max-width: 960px;
        }
    }
    .maxwid {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
