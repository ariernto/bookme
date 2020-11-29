<div class="bravo-form-search-event @if(!empty($style) and $style == "carousel") bravo-form-search-slider @endif" @if(empty($style)) style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$bg_image_url}}') !important" @endif>
    @if(!empty($style) and $style == "carousel" and !empty($list_slider))
        <div class="effect">
            <div class="owl-carousel">
                @foreach($list_slider as $item)
                    @php $img = get_file_url($item['bg_image'],'full') @endphp
                    <div class="item">
                        <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$img}}') !important"></div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading text-center">{{$title}}</h1>
                <div class="sub-heading text-center">{{$sub_title}}</div>
                <div class="g-form-control">
                    @include('Event::frontend.layouts.search.form-search')
                </div>
            </div>
        </div>
    </div>
</div>
