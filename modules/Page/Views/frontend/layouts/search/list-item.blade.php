<div class="row">
    <div class="col-lg-12 col-md-12">

        <div class="bravo-list-item">

            <div class="topbar-search">
                <div class="row">
                    <h2 class="text titlecla col-lg-12">
                        WE CHOOSE FOR YOU
                    </h2>
                </div>
                <div class="row">
                    <p class="col-lg-12 desccla">Lorem ipsum dolor sit amet, conseetuer adipiscing elit.</p>
                </div>
                <div class="row padposit">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 col-md-12 row">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-2 col-md-2 showall">
                            <button class="btn allfirst">All</button>
                        </div>
                        <div class="col-lg-2 col-md-2 hideall">
                        <button class="btn menubtn">All</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn">Activity</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn">Tour</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn">Cottage</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn">Sauna</button>
                        </div>
                        <div class="col-lg-1 col-md-1"></div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>

            <div class="list-item">

                <div class="row">

                    @if($rows->total() > 0)

                        @foreach($rows as $row)

                            <div class="col-lg-4 col-md-6">

                                @include('Tour::frontend.layouts.search.loop-gird')

                            </div>

                        @endforeach

                    @else

                        <div class="col-lg-12">

                            {{__("Tour not found")}}

                        </div>

                    @endif

                </div>

            </div>

            <div class="bravo-pagination">

                {{$rows->appends(request()->query())->links()}}

                @if($rows->total() > 0)

                    <span class="count-string">{{ __("Showing :from - :to of :total Tours",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>

                @endif

            </div>

        </div>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).on('ready',function(){
        var a = 0;
        $('.menubtn').click(function() {
            if (a == 0)
            {
                $('.hideall').css('display','block');
                $('.showall').css('display','none');
            }
            $('.menubtn').not($(this)).css('background', '#F7F6F5');
            $(this).css('background','#C29D59');
            a++;
        });
    });
</script>
