<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','product_id','status','deliver_time','address'];

    public function product(){
        return $this->belongsTo('App\Product');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function notifications(){
        return $this->hasMany('App\Notification','order_id');
    }
}
