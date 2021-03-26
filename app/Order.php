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
        'total',
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

    public function getHours() {
            
        $hours = [  '10:15', '10:30', '10:45', '11:00',
                    '11:15', '11:30', '11:45', '12:00',
                    '12:15', '12:30', '12:45', '13:00',
                    '13:15', '13:30', '13:45', '14:00',
                    '14:15', '14:30', '14:45', '15:00',
                    '15:15', '15:30', '15:45', '16:00',
                    '16:15', '16:30', '16:45', '17:00',
                    '17:15', '17:30', '17:45', '18:00',
                    '18:15', '18:30', '18:45', '19:00',
                    '19:15', '19:30', '19:45', '20:00',
                    '20:15', '20:30', '20:45', '20:00',
                    '21:15', '21:30', '21:45', '21:00',
                    '22:15', '22:30', '22:45', '22:00',
                    
                ];

        return $hours;

    }

    
}
