<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

use Modules\Tour\Models\Tour;

use Illuminate\Http\Request;

use Modules\Tour\Models\TourCategory;

use Modules\Location\Models\Location;

use Modules\Review\Models\Review;

use Modules\Core\Models\Attributes;

class FilterSearchHome extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Desc')
                ],
                [
                    'id'        => 'number',
                    'type'      => 'input',
                    'inputType' => 'number',
                    'label'     => __('Number Item')
                ],
                [
                    'id'            => 'style',
                    'type'          => 'radios',
                    'label'         => __('Style'),
                    'values'        => [
                        [
                            'value'   => 'normal',
                            'name' => __("Normal")
                        ],
                        [
                            'value'   => 'carousel',
                            'name' => __("Slider Carousel")
                        ],
                        [
                            'value'   => 'box_shadow',
                            'name' => __("Box Shadow")
                        ]
                    ]
                ],
                [
                    'id'      => 'category_id',
                    'type'    => 'select2',
                    'label'   => __('Filter by Category'),
                    'select2' => [
                        'ajax'  => [
                            'url'      => url('/admin/module/tour/category/getForSelect2'),
                            'dataType' => 'json'
                        ],
                        'width' => '100%',
                        'allowClear' => 'true',
                        'placeholder' => __('-- Select --')
                    ],
                    'pre_selected'=>url('/admin/module/tour/category/getForSelect2?pre_selected=1')
                ],
                [
                    'id'      => 'location_id',
                    'type'    => 'select2',
                    'label'   => __('Filter by Location'),
                    'select2' => [
                        'ajax'  => [
                            'url'      => url('/admin/module/location/getForSelect2'),
                            'dataType' => 'json'
                        ],
                        'width' => '100%',
                        'allowClear' => 'true',
                        'placeholder' => __('-- Select --')
                    ],
                    'pre_selected'=>url('/admin/module/location/getForSelect2?pre_selected=1')
                ],
                [
                    'id'            => 'order',
                    'type'          => 'radios',
                    'label'         => __('Order'),
                    'values'        => [
                        [
                            'value'   => 'id',
                            'name' => __("Date Create")
                        ],
                        [
                            'value'   => 'title',
                            'name' => __("Title")
                        ],
                    ]
                ],
                [
                    'id'            => 'order_by',
                    'type'          => 'radios',
                    'label'         => __('Order By'),
                    'values'        => [
                        [
                            'value'   => 'asc',
                            'name' => __("ASC")
                        ],
                        [
                            'value'   => 'desc',
                            'name' => __("DESC")
                        ],
                    ]
                ],
                [
                    'type'=> "checkbox",
                    'label'=>__("Only featured items?"),
                    'id'=> "is_featured",
                    'default'=>true
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Tour: List Items');
    }

    public function content($model = [])
    {
        $list = $this->query($model);
        $markers = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $markers[] = [
                    "id" => $row->id,
                    "title" => $row->title,
                    "lat" => (float)$row->map_lat,
                    "lng" => (float)$row->map_lng,
                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Tour::frontend.layouts.search.loop-gird', ['row' => $row, 'disable_lazyload' => 1, 'wrap_class' => 'infobox-item'])->render(),
                    'marker' => url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("space_location_search_style")) or setting_item("space_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows' => $list,
            'tour_category' => TourCategory::where('status', 'publish')->with(['translations'])->get()->toTree(),
            'tour_location' => Location::where('status', 'publish')->with(['translations'])->limit($limit_location)->get()->toTree(),
            'tour_min_max_price' => Tour::getMinMaxPrice(),
            'markers' => $markers,
            "blank" => 1,
            "seo_meta" => Tour::getSeoMetaForPageList()
        ];
        $layout = setting_item("tour_layout_search", 'normal');
        $data['attributes'] = Attributes::where('service', 'tour')->with(['terms','translations'])->get();
        if ($layout == "map") {
            $data['body_class'] = 'has-search-map';
            $data['html_class'] = 'full-page';
            return view('Tour::frontend.search-map', $data);
        }
        return view('Tour::frontend.search', $data);
    }

    public function contentAPI($model = []){
        $rows = $this->query($model);
        $model['data']= $rows->map(function($row){
            return $row->dataForApi();
        });
        return $model;
    }

    public function query($model){
        $model_Tour = Tour::select("bravo_tours.*")->with(['location','translations','hasWishList']);
        if(empty($model['order'])) $model['order'] = "id";
        if(empty($model['order_by'])) $model['order_by'] = "desc";
        if(empty($model['number'])) $model['number'] = 5;
        if (!empty($model['location_id'])) {
            $location = Location::where('id', $model['location_id'])->where("status","publish")->first();
            if(!empty($location)){
                $model_Tour->join('bravo_locations', function ($join) use ($location) {
                    $join->on('bravo_locations.id', '=', 'bravo_tours.location_id')
                        ->where('bravo_locations._lft', '>=', $location->_lft)
                        ->where('bravo_locations._rgt', '<=', $location->_rgt);
                });
            }
        }
        if (!empty($model['category_id'])) {
            $category_ids = [$model['category_id']];
            $list_cat = TourCategory::whereIn('id', $category_ids)->where("status","publish")->get();
            if(!empty($list_cat)){
                $where_left_right = [];
                foreach ($list_cat as $cat){
                    $where_left_right[] = " ( bravo_tour_category._lft >= {$cat->_lft} AND bravo_tour_category._rgt <= {$cat->_rgt} ) ";
                }
                $sql_where_join = " ( ".implode("OR" , $where_left_right)." )  ";
                $model_Tour
                    ->join('bravo_tour_category', function ($join) use($sql_where_join) {
                        $join->on('bravo_tour_category.id', '=', 'bravo_tours.category_id')
                            ->WhereRaw($sql_where_join);
                    });
            }
        }
        if(!empty($model['is_featured']))
        {
            $model_Tour->where('is_featured',1);
        }
        $model_Tour->orderBy("bravo_tours.".$model['order'], $model['order_by']);
        $model_Tour->where("bravo_tours.status", "publish");
        $model_Tour->with('location');
        $model_Tour->groupBy("bravo_tours.id");
        return $model_Tour->limit($model['number'])->get();
    }
}
