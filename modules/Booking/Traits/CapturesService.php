<?php
    namespace Modules\Booking\Traits;

    use Modules\Booking\Models\Service;

    trait CapturesService {


        protected static function bootCapturesService()
        {
            foreach (static::getModelEvents() as $event) {
                static::$event(function ($model) use ($event) {
                    $model->capturesService($event);
                });
            }
        }
        protected static function getModelEvents()
        {
            if (isset(static::$capturedEvents)) {
                return static::$capturedEvents;
            }
            return ['saved','deleted','restored'];
        }

        public function getActivityName($model, $action)
        {
            $name = strtolower(class_basename($model));

            return "{$action}_{$name}";
        }

        public function capturesService($event)
        {
            if(in_array($event,['saved','created', 'updated'])){
                Service::cloneService($this,$event);
            }
            if($event=='deleted'){
                Service::deleteService($this);
            }
            if($event=='restored'){
                Service::restoreService($this);
            }


        }
    }