<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooptation extends Model
{
    public function coopted()
    {
        return $this->belongsTo(User::class, 'coopted_id');
    }

    public function coopter()
    {
        return $this->belongsTo(User::class, 'coopter_id');
    }


    public function createCoupon(){
        $coupon = new Coupon();
        $coupon->user_id = $this->coopter_id;
        $coupon->amount = 5;
        $coupon->save();
    }
}
