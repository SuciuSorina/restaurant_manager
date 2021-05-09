<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $coupons;

    protected $fillable=["min_value_required","discount", "code"];


}
