<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['description'];

    public function variations(){
        return $this->belongsTo('App\Variation');
    }
}
