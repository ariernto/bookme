<div class="bravo-list-tour">
    <div class="container carouselrow">
        <div class="list-item  maxwid">
            <div class="owl-carousel">
                @foreach ($tour_location as $row)
                    @include('Tour::frontend.layouts.search.loop-gird-carousel')
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            items: 4,
            navText: ['<','>'],
        });
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
    .owl-carousel .owl-nav button{width: 35px; height: 35px; text-align:center; border:1px solid #ccc !important;}
</style>
