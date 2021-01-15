<div class="bravo-list-tour">
    <div class="container carouselrow">
        <div class="list-item">
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
    .owl-carousel .owl-nav button{width: 35px; height: 35px; text-align:center; border:1px solid #ccc !important;}
</style>
