<div class="filter-item">
    <div class="form-group">
        <i class="field-icon icofont-beach"></i>
        <div class="form-content">
            <?php
            $cat_name = "";
            $list_cat_json = [];
            $traverse = function ($categories, $prefix = '') use (&$traverse, &$list_cat_json , &$cat_name) {
                foreach ($categories as $category) {
                    $translate = $category->translateOrOrigin(app()->getLocale());
                    if (request()->query('cat_id') == $category->id){
                        $cat_name = $translate->name;
                    }
                    $list_cat_json[] = [
                        'id' => $category->id,
                        'title' => $prefix . ' ' . $translate->name,
                    ];
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($tour_category);
            ?>
            <div class="smart-search">
                <input type="text" class="smart-select parent_text form-control" readonly placeholder="{{__("All Category")}}" value="{{ $cat_name }}" data-default="{{ json_encode($list_cat_json) }}">
                <input type="hidden" class="child_id" name="cat_id" value="{{Request::query('cat_id')}}">
            </div>
        </div>
    </div>
</div>