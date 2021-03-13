<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\OrderPart;
use Auth;

class Order extends Model
{
    
    use SoftDeletes;
    protected $orders;
    protected $fillable = [
        'user_id',
        'delivery_type',
        'status',
        'comment',
        'hour'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orderParts(){
        return $this->hasMany('App\OrderPart');
    }

    
    public static function removeAllOrdersAndOrderParts() {
        
        $loggedUserId = Auth::user()->id;

        $order = self::where('user_id', $loggedUserId)->where('status', 'DRAFT')->orderBy('created_at','desc')->first();
        
        if ($order) {
            $orderParts = OrderPart::where('order_id', $order->id)->get();
            if(count($orderParts)) {
                foreach($orderParts as $part) {
                    $part->delete();
                }
            }
            $order->delete();
        }

        return true;

    }
}
