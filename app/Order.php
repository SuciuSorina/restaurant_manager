<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'user_id',
        'delivery_type',
        'status',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
