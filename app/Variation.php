<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = ['description', 'products_id'];
    
    public function product(){
        return $this->hasMany('App\Product');
    }
}
