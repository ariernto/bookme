<?php


    namespace Modules\Booking\Models;


    class ServiceTranslation extends Service
    {
        protected $table = 'bravo_service_translations';

        protected $fillable = [
            'title',
            'address',
            'content',
            'locale',
        ];
        protected $slugField     = false;
    }