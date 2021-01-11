<div class="bravo_filter">
    <form action="<?php echo e(url(app_get_locale(false,false,'/').config('tour.tour_route_prefix'))); ?>" class="bravo_form_filter">
        <?php if( !empty(Request::query('location_id')) ): ?>
            <input type="hidden" name="location_id" value="<?php echo e(Request::query('location_id')); ?>">
        <?php endif; ?>
        <?php if( !empty(Request::query('start')) and !empty(Request::query('end')) ): ?>
            <input type="hidden" value="<?php echo e(Request::query('start',date("d/m/Y",strtotime("today")))); ?>" name="start">
            <input type="hidden" value="<?php echo e(Request::query('end',date("d/m/Y",strtotime("+1 day")))); ?>" name="end">
            <input type="hidden" name="date" value="<?php echo e(Request::query('date')); ?>">
        <?php endif; ?>
        <div class="filter-title">
            <?php echo e(__("FILTER BY")); ?>

        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3><?php echo e(__("Filter Price")); ?></h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <div class="bravo-filter-price">
                    <?php
                    $price_min = $pri_from = floor ( App\Currency::convertPrice($tour_min_max_price[0]) );
                    $price_max = $pri_to = ceil ( App\Currency::convertPrice($tour_min_max_price[1]) );
                    if (!empty($price_range = Request::query('price_range'))) {
                        $pri_from = explode(";", $price_range)[0];
                        $pri_to = explode(";", $price_range)[1];
                    }
                    $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                    ?>
                    <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                           data-symbol=" <?php echo e($currency['symbol'] ?? ''); ?>"
                           data-min="<?php echo e($price_min); ?>"
                           data-max="<?php echo e($price_max); ?>"
                           data-from="<?php echo e($pri_from); ?>"
                           data-to="<?php echo e($pri_to); ?>"
                           readonly="" value="<?php echo e($price_range); ?>">
                    <button type="submit" class="btn btn-link btn-apply-price-range"><?php echo e(__("APPLY")); ?></button>
                </div>
            </div>
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3><?php echo e(__("Review Score")); ?></h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <ul>
                    <?php for($number = 5 ;$number >= 1 ; $number--): ?>
                        <li>
                            <div class="bravo-checkbox">
                                <label>
                                    <input name="review_score[]" type="checkbox" value="<?php echo e($number); ?>" <?php if(  in_array($number , request()->query('review_score',[])) ): ?>  checked <?php endif; ?>>
                                    <span class="checkmark"></span>
                                    <?php for($review_score = 1 ;$review_score <= $number ; $review_score++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor; ?>
                                </label>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h3><?php echo e(__("Tour Type")); ?></h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <ul>
                    <?php
                    $current_category_ids = Request::query('cat_id');
                    $traverse = function ($categories, $prefix = '') use (&$traverse, $current_category_ids) {
                    $i = 0;
                    foreach ($categories as $category) {
                        $checked = '';
                        if (!empty($current_category_ids)) {
                            foreach ($current_category_ids as $key => $current) {
                                if ($current == $category->id)
                                    $checked = 'checked';
                            }
                        }
                        $traslate = $category->translateOrOrigin(app()->getLocale())
                        ?>
                        <li <?php if($i > 2 and empty($current_category_ids)): ?> class="hide" <?php endif; ?>>
                            <div class="bravo-checkbox">
                                <label>
                                    <input name="cat_id[]" <?php echo e($checked); ?> type="checkbox" value="<?php echo e($category->id); ?>"> <?php echo e($prefix); ?> <?php echo e($traslate->name); ?>

                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <?php
                        $i++;
                        $traverse($category->children, $prefix . '-');
                        }
                    };
                    $traverse($tour_category);
                    ?>
                </ul>
                <?php if(count($tour_category) > 3 and empty($current_category_ids)): ?>
                    <button type="button" class="btn btn-link btn-more-item"><?php echo e(__("More")); ?> <i class="fa fa-caret-down"></i></button>
                <?php endif; ?>
            </div>
        </div>
        <?php
            $selected = (array) Request::query('terms');
        ?>
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $translate = $item->translateOrOrigin(app()->getLocale());
            ?>
            <div class="g-filter-item">
                <div class="item-title">
                    <h3> <?php echo e($translate->name); ?> </h3>
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </div>
                <div class="item-content">
                    <ul>
                        <?php $__currentLoopData = $item->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $translate = $term->translateOrOrigin(app()->getLocale()); ?>
                            <li <?php if($key > 2 and empty($selected)): ?> class="hide" <?php endif; ?>>
                                <div class="bravo-checkbox">
                                    <label>
                                        <input <?php if(in_array($term->id,$selected)): ?> checked <?php endif; ?> type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>"> <?php echo $translate->name; ?>

                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php if(count($item->terms) > 3 and empty($selected)): ?>
                        <button type="button" class="btn btn-link btn-more-item"><?php echo e(__("More")); ?> <i class="fa fa-caret-down"></i></button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>
</div>


<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/frontend/layouts/search/filter-search.blade.php ENDPATH**/ ?>