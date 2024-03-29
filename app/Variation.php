<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = ['description', 'product_id'];
    
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
