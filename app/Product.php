<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price','description','photo_id','category_id','top_ad'];


    public function Photo(){

        return $this->belongsTo('App\Photo');
     }

     public function category(){

        return $this->belongsTo('App\category');
     }

     public function users()
     {
         return $this->belongsToMany('App\User','orders')->withPivot('user_id', 'product_id');
     }

    public function offers()
    {
        return $this->belongsToMany('App\Offer','product_offers');
    }



     public function usersFavoried()
     {
         return $this->belongsToMany('App\User','favorites');
     }

     public function sponsers(){

        return $this->belongsToMany('App\Sponser','sponser_add','product_id','sponser_id');
    }

}
