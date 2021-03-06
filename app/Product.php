<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $products;

    protected $fillable = [
        'name', 'category_id', 'price'
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
