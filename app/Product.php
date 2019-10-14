<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['description', 'price'];

    public function variations(){
        return $this->hasMany('App\Variation');
    }
}
