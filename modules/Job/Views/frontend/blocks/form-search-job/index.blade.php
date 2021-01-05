<div class="bravo-form-search-hotel @if(!empty($style) and $style == "carousel") bravo-form-search-slider @endif" @if(empty($style)) style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$bg_image_url}}') !important;padding:0px" @endif>
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
        <div class="row" style="height: 500px;">
            <div class="col-lg-8" style="height: 100%;padding-top:120px">
                <h3 class="text-heading" style="font-size: 30px">{{$title}}</h3>
                <div class="g-form-control">
                    @include('Job::frontend.layouts.search.form-search')
                </div>
                <div class="sub-heading">{{$sub_title}}</div>
            </div>
        </div>
</div>