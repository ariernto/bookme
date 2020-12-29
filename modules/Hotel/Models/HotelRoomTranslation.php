<?php

namespace Modules\Hotel\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Booking\Models\Bookable;
use Modules\Booking\Models\Booking;
use Modules\Core\Models\SEO;
use Modules\Media\Helpers\FileHelper;
use Modules\Review\Models\Review;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Hotel\Models\HotelTranslation;
use Modules\User\Models\UserWishList;

class HotelRoomTranslation extends Bookable
{
    use SoftDeletes;
    protected $table = 'bravo_hotel_room_translations';
    public $type = 'hotel_room_translation';

    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    protected $seo_type = 'hotel_room_translation';


    protected $bookingClass;
    protected $reviewClass;
    protected $hotelDateClass;
    protected $hotelRoomTermClass;
    protected $hotelTranslationClass;
    protected $userWishListClass;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->bookingClass = Booking::class;
        $this->reviewClass = Review::class;
        $this->hotelRoomTermClass = HotelRoomTerm::class;
        $this->hotelTranslationClass = HotelTranslation::class;
        $this->userWishListClass = UserWishList::class;
    }

    public static function getModelName()
    {
        return __("Hotel Room");
    }

    public static function getTableName()
    {
        return with(new static)->table;
    }


    public function terms(){
        return $this->hasMany($this->hotelRoomTermClass, "target_id");
    }
}
