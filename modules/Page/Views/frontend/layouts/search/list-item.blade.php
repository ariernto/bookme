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
                            <button class="btn menubtn allfirst">All</button>
                        </div>
                        <div class="col-lg-2 col-md-2 hideall">
                            <button class="btn menubtn filter-button" data-filter="all">All</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn filter-button" data-filter="Lapland">Activity</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn filter-button" data-filter="Helsinki">Tour</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn filter-button" data-filter="Porvoo">Cottage</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn menubtn filter-button" data-filter="Virginia">Sauna</button>
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

                            <div class="col-lg-4 col-md-6 filter {{$row->location->name}}">

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

        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');

            if(value == "all")
            {
                $('.filter').show('1000');
            }
            else
            {
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');

            }
        });

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
            $(this).addClass("active");
    });

</script>
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
    .gallery-title
    {
        font-size: 36px;
        color: #42B32F;
        text-align: center;
        font-weight: 500;
        margin-bottom: 70px;
    }
    .gallery-title:after {
        content: "";
        position: absolute;
        width: 7.5%;
        left: 46.5%;
        height: 45px;
        border-bottom: 1px solid #5e5e5e;
    }
    .filter-button
    {
        font-size: 18px;
        text-align: center;
        margin-bottom: 30px;

    }
    .filter-button:hover
    {
        font-size: 18px;
        border-radius: 5px;
        text-align: center;
        color: black;

    }
    .btn-default:active .filter-button:active
    {
        color: black;
    }

    .port-image
    {
        width: 100%;
    }

    .gallery_product
    {
        margin-bottom: 30px;
    }

    </style>
