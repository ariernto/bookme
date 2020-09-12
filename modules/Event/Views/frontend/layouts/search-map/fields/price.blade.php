<div class="filter-item filter-simple dropdown">
    <div class="form-group dropdown-toggle" data-toggle="dropdown" >
        <h3 class="filter-title">{{__('Price filter')}} <i class="fa fa-angle-down"></i></h3>
    </div>
    <div class="filter-dropdown dropdown-menu dropdown-menu-right">
        <div class="bravo-filter-price">
            <?php
            $price_min = $pri_from = floor ( App\Currency::convertPrice($event_min_max_price[0]) );
            $price_max = $pri_to = ceil ( App\Currency::convertPrice($event_min_max_price[1]) );
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
            <div class="text-right">
                <br>
                <a href="#" onclick="return false;" class="btn btn-primary btn-sm btn-apply-advances">{{__("APPLY")}}</a>
            </div>
        </div>
    </div>
</div>
