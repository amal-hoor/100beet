<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=['order_id','body','offer_id'];


    public function users(){

        return $this->belongsToMany('App\User','user_notifications')->withPivot('user_id', 'notification_id');;
   }


   public function offers(){
       return $this->belongsTo('App\Offer','offer_id');
   }


   public function orders(){
    return $this->belongsTo('App\Order','order_id');
   }


}
