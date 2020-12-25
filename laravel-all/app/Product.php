<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category1()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
