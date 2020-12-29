<div class="bravo_filter">
    <form action="{{ route("hotel.search") }}" class="bravo_form_filter">
        @if( !empty(Request::query('location_id')) )
            <input type="hidden" name="location_id" value="{{Request::query('location_id')}}">
        @endif
        @if( !empty(Request::query('start')) and !empty(Request::query('end')) )
            <input type="hidden" value="{{Request::query('start',date("d/m/Y",strtotime("today")))}}" name="start">
            <input type="hidden" value="{{Request::query('end',date("d/m/Y",strtotime("+1 day")))}}" name="end">
            <input type="hidden" name="date" value="{{Request::query('date')}}">
        @endif
        <div class="filter-title">
            {{__("FILTER BY")}}
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3>{{__("Filter Price")}}</h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <div class="bravo-filter-price">
                    <?php
                    $price_min = $pri_from = floor ( App\Currency::convertPrice($hotel_min_max_price[0]) );
                    $price_max = $pri_to = ceil ( App\Currency::convertPrice($hotel_min_max_price[1]) );
                    if (!empty($price_range = Request::query('price_range'))) {
                        $pri_from = explode(";", $price_range)[0];
                        $pri_to = explode(";", $price_range)[1];
                    }
                    $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                    ?>
                    <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                           data-symbol=" {{$currency['symbol'] ?? ''}}"
                           data-min="{{$price_min}}"
                           data-max="{{$price_max}}"
                           data-from="{{$pri_from}}"
                           data-to="{{$pri_to}}"
                           readonly="" value="{{$price_range}}">
                    <button type="submit" class="btn btn-link btn-apply-price-range">{{__("APPLY")}}</button>
                </div>
            </div>
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3>{{__("Hotel Star")}}</h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <ul>
                    @for ($number = 5 ;$number >= 1 ; $number--)
                        <li>
                            <div class="bravo-checkbox">
                                <label>
                                    <input name="star_rate[]" type="checkbox" value="{{$number}}" @if(  in_array($number , request()->query('star_rate',[])) )  checked @endif>
                                    <span class="checkmark"></span>
                                    @for ($star = 1 ;$star <= $number ; $star++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </label>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3>{{__("Review Score")}}</h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <ul>
                    @for ($number = 5 ;$number >= 1 ; $number--)
                        <li>
                            <div class="bravo-checkbox">
                                <label>
                                    <input name="review_score[]" type="checkbox" value="{{$number}}" @if(  in_array($number , request()->query('review_score',[])) )  checked @endif>
                                    <span class="checkmark"></span>
                                    @for ($review_score = 1 ;$review_score <= $number ; $review_score++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </label>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        @php
            $selected = (array) Request::query('terms');
        @endphp
        @foreach ($attributes as $item)
            @php
                $translate = $item->translateOrOrigin(app()->getLocale());
            @endphp
            <div class="g-filter-item">
                <div class="item-title">
                    <h3> {{$translate->name}} </h3>
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </div>
                <div class="item-content">
                    <ul>
                        @foreach($item->terms as $key => $term)
                            @php $translate = $term->translateOrOrigin(app()->getLocale()); @endphp
                            <li @if($key > 2 and empty($selected)) class="hide" @endif>
                                <div class="bravo-checkbox">
                                    <label>
                                        <input @if(in_array($term->id,$selected)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}"> {!! $translate->name !!}
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @if(count($item->terms) > 3 and empty($selected))
                        <button type="button" class="btn btn-link btn-more-item">{{__("More")}} <i class="fa fa-caret-down"></i></button>
                    @endif
                </div>
            </div>
        @endforeach
    </form>
</div>


