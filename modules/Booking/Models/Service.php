<?php


    namespace Modules\Booking\Models;


    use App\BaseModel;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Modules\Car\Models\Car;
    use Modules\Hotel\Models\Hotel;
    use Modules\Space\Models\Space;
    use Modules\Tour\Models\Tour;

    class Service extends BaseModel
    {
        use SoftDeletes;
        public $type ='service';
        public $allowType  = [
            'hotel',
            'space',
            'tour',
            'car'
        ];
        protected $table = 'bravo_services';
        protected $slugField     = 'slug';
        protected $slugFromField = 'title';
        protected $fillable=[
          'title',
          'location_id',
          'category_id',
          'address',
          'map_lat',
          'map_lng',
          'is_featured',
          'star_rate',
          'price',
          'sale_price',
          'min_people',
          'max_people',
          'max_guests',
          'review_score',
          'min_day_before_booking',
          'min_day_stays',
          'locale',
          'object_id',
          'object_model',
          'status'
        ];

        public static function cloneService($model,$event)
        {
            try {
                if (!empty($model->type) and $model->type != 'service' and in_array($model->type, (new Service())->allowType)) {
                    $service = self::where('object_model', $model->type)->where('object_id', $model->id)->first();
                    if (empty($service)) {
                        $service = new Service();
                    }
                    if (is_default_lang()) {
                        $service->fill($model->attributes);
                        $service->object_id = $model->id;
                        $service->object_model = $model->type;
                        $service->save();
                    } else {
                        $getRecordRoot = $model->getRecordRoot;
                        if (!empty($getRecordRoot)) {
                            $service = self::where('object_model', $getRecordRoot->type)->where('object_id', $getRecordRoot->id)->first();
                            if (empty($service)) {
                                $service = new Service();
                                $service->fill($getRecordRoot->attributes);
                                $service->object_id = $getRecordRoot->id;
                                $service->object_model = $getRecordRoot->type;
                                $service->save();
                            }
                            $serviceTranslation = new ServiceTranslation($model->attributes);
                            $service->Translations()->save($serviceTranslation);
                        }
                    }
                }
            } catch (\Exception $e) {
            }

        }
        public static function deleteService($model)
        {
            try {
                if (!empty($model->type) and $model->type != 'service' and in_array($model->type, (new Service())->allowType)) {
                    $service = self::where('object_model', $model->type)->where('object_id', $model->id)->first();
                    if (!empty($service)) {
                        $a  = $service->delete();
                    }

                }
            } catch (\Exception $e) {
            }

        }
        public static function restoreService($model)
        {
            try {
                if (!empty($model->type) and $model->type != 'service' and in_array($model->type, (new Service())->allowType)) {
                    $service = self::withTrashed()->where('object_model', $model->type)->where('object_id', $model->id)->first();
                    if (!empty($service)) {
                        $service->restore();
                    }
                }
            } catch (\Exception $e) {
            }

        }

    }

