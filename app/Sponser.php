<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponser extends Model
{
    protected $fillable=['unit','price'];

    public function users(){

        return $this->belongsToMany('App\User','sponser_add','user_id','sponser_id');
    }

    public function products(){

        return $this->belongsToMany('App\Product','sponser_add','sponser_id','product_id');
    }


}
