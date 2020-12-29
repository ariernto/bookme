<?php
namespace Modules\Activity\Models;

use App\BaseModel;

class ActivityDate extends BaseModel
{
    protected $table = 'bravo_activity_dates';
    protected $activityMetaClass;

    protected $casts = [
        'person_types'=>'array'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->activityMetaClass = ActivityMeta::class;
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
        $meta = $this->activityMetaClass::where('activity_date_id', $this->id)->first();
        if (!$meta) {
            $meta = new $this->activityMetaClass();
            $meta->activity_date_id = $this->id;
        }
        return $meta->saveMetaOriginOrTranslation($request->input() , $locale);
    }
}
