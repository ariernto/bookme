<?php

    namespace Modules\Location\Models;

    use App\BaseModel;
    use Illuminate\Http\Request;
    use Kalnoy\Nestedset\NodeTrait;
    use Modules\Booking\Models\Bookable;
    use Modules\Media\Helpers\FileHelper;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Modules\Core\Models\SEO;

    class Location extends Bookable
    {
        use SoftDeletes;
        use NodeTrait;
        protected $table         = 'bravo_locations';
        protected $fillable      = [
            'name',
            'content',
            'image_id',
            'map_lat',
            'map_lng',
            'map_zoom',
            'status',
            'parent_id',
            'banner_image_id',
            'trip_ideas',
        ];
        protected $slugField     = 'slug';
        protected $slugFromField = 'name';
        protected $seo_type      = 'location';
        protected $casts         = [
            'trip_ideas' => 'array'
        ];

        public static function getModelName()
        {
            return __("Location");
        }

        public static function searchForMenu($q = false)
        {
            $query = static::select('id', 'name');
            if (strlen($q)) {

                $query->where('name', 'like', "%" . $q . "%");
            }
            $a = $query->limit(10)->get();
            return $a;
        }

        public function getImageUrl($size = "medium")
        {
            $url = FileHelper::url($this->image_id, $size);
            return $url ? $url : '';
        }

        public function getDisplayNumberServiceInLocation($service_type)
        {
            $allServices = get_bookable_services();
            if(empty($allServices[$service_type])) return false;
            $module = new $allServices[$service_type];
            return $module->getNumberServiceInLocation($this);
        }


        public function getDetailUrl($locale = false)
        {
            return url(app_get_locale(false, false, '/') . config('location.location_route_prefix') . "/" . $this->slug);
        }

        public function getLinkForPageSearch($service_type)
        {
            $allServices = get_bookable_services();
            $module = new $allServices[$service_type];
            return $module->getLinkForPageSearch(false, ['location_id' => $this->id]);
        }


        public static function search(Request $request)
        {
            $query = parent::query()->select("bravo_locations.*");
            if(!empty( $service_name = $request->query("service_name") )){
                if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app()->getLocale() ){
                    $query->leftJoin('bravo_location_translations', function ($join) {
                        $join->on('bravo_locations.id', '=', 'bravo_location_translations.origin_id');
                    });
                    $query->where('bravo_location_translations.name', 'LIKE', '%' . $service_name . '%');

                }else{
                    $query->where('bravo_locations.name', 'LIKE', '%' . $service_name . '%');
                }
            }
            $query->orderBy("id", "desc");
            $query->groupBy("bravo_locations.id");
            $limit = min(20,$request->query('limit',9));
            return $query->with(['translations'])->paginate($limit);
        }

        public function dataForApi($forSingle = false){
            $translation = $this->translateOrOrigin(app()->getLocale());
            $data = [
                'id'=>$this->id,
                'title'=>$translation->name,
                'image'=>get_file_url($this->image_id),
                'content'=>$translation->content,
            ];
            if($forSingle){
                $data["map_lat"] = $this->map_lat;
                $data["map_lng"] = $this->map_lng;
                $data["map_zoom"] = $this->map_zoom;
                $data["banner_image"] = get_file_url($this->banner_image_id,'full');
                $data["trip_ideas"] = null;
                if(!empty($this->trip_ideas)){
                    $trip_ideas =  json_decode($this->trip_ideas,true);
                    foreach ($trip_ideas as &$item){
                        $item['image'] = get_file_url($item['image_id'],'full');
                    }
                    $data["trip_ideas"] = $trip_ideas;
                }
            }
            return $data;
        }
    }
