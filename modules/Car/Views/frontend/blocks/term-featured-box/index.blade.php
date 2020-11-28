@if(!empty($list_term))
    <div class="bravo-car-term-featured-box">
        <div class="container">
            <div class="title">
                {{$title}}
            </div>
            @if($desc)
                <div class="sub-title">
                    {{$desc}}
                </div>
            @endif
            <div class="row">
                @foreach($list_term as $item)
                    <?php
                    $image_url = get_file_url($item->image_id, 'full');
                    $page_search = Modules\Car\Models\Car::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    ?>
                    <div class="col-md-6 col-md-4 col-lg-3">
                        <a href="{{ $page_search }}">
                            <div class="featured-item">
                                <div class="image">
                                    <img src="{{$image_url}}" class="img-responsive" alt="{{$item->name}}">
                                </div>
                                <h4 class="text">
                                    {{$item->name}}
                                </h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
