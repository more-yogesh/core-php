<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'age',
        'mobile',
        'tbl_category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'tbl_category_id');
    }
}
