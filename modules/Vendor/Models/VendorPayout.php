<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/13/2019
 * Time: 3:24 PM
 */
namespace Modules\Vendor\Models;

use App\BaseModel;
use App\User;

class VendorPayout extends BaseModel
{
    protected $table = 'bravo_payouts';

    public static function getAllStatuses(){
        return [
            'initial'=>[
                'title'=>__("Initial")
            ],
            'confirmed'=>[
                'title'=>__("Confirmed")
            ],
            'paid'=>[
                'title'=>__("Paid")
            ],
            'rejected'=>[
                'title'=>__("Rejected")
            ],
        ];
    }

    public function getPayoutMethodNameAttribute()
    {
        $all = json_decode(setting_item('vendor_payout_methods'));
        if(!empty($all))
        {
            foreach ($all as $item){
                if($item->id == $this->payout_method)
                {
                    return $item->name;
                }
            }
        }

        return $this->payout_method;
    }

    public function vendor(){
        return $this->hasOne(User::class,'id','vendor_id')->withDefault();
    }

    public function getStatusTextAttribute(){
        switch ($this->status){
            default:
                return booking_status_to_text($this->status);
                break;
        }
    }

    public static function countInitial(){
        return parent::query()->where('status','initial')->count('id');
    }
}
