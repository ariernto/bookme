<?php
namespace Modules\Tour\Models;

use App\BaseModel;

class TourDate extends BaseModel
{
    protected $table = 'bravo_tour_dates';
    protected $tourMetaClass;

    protected $casts = [
        'person_types'=>'array'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->tourMetaClass = TourMeta::class;
    }

    public static function getDatesInRanges($date,$target_id){
        return static::query()->where([
            ['start_date','>=',$date],
            ['end_date','<=',$date],
            ['target_id','=',$target_id],
        ])->first();
    }
    public function saveMeta(\Illuminate\Http\Request $request)
    {
        $locale = $request->input('lang');
        $meta = $this->tourMetaClass::where('tour_date_id', $this->id)->first();
        if (!$meta) {
            $meta = new $this->tourMetaClass();
            $meta->tour_date_id = $this->id;
        }
        return $meta->saveMetaOriginOrTranslation($request->input() , $locale);
    }
}
