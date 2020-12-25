<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'price',
        'image'
    ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }
}
