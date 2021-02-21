<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $products;

    protected $fillable = [
        'name', 'category_id'
    ];

    public static function getAll()
    {
        return self::with('category')->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

}
