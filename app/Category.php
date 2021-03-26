<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $categories;
    protected $fillable = [
        'name',
    ];

    public function getAll()
    {
        return $this->get();
    }

    public function products() {
        return $this->belongsTo('App\Product');
    }

}
