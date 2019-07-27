<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable=['new_price','status'];

    public function notifications(){
        return $this->hasMany('App\Notification','offer_id');
    }


    public function products()
    {
        return $this->belongsToMany('App\Product','product_offers');
    }


}
