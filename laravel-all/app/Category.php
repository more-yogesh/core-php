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
}
