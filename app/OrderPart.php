<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPart extends Model
{
    
    use SoftDeletes;
    protected $orderParts;
    
    protected $fillable = [
        'order_id',
        'product_name',
        'product_id',
        'product_price',
        'quantity',
        'price'
    ];

    // public function product()
    // {
    //     return $this->belongsTo('App\Product');
    // }
}
