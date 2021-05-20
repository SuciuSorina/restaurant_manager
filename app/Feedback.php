<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $feedbacks;
    protected $fillable=["user_id", "description"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
