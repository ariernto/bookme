<div class="bravo-form-search-space" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$bg_image_url}}') !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading text-center">{{$title}}</h1>
                <h2 class="sub-heading text-center">{{$sub_title}}</h2>
                <div class="g-form-control">
                    @include('Space::frontend.layouts.search.form-search')
                </div>
            </div>
        </div>
    </div>
</div>