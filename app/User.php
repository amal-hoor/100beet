<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','verify_code','mobile','block',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }

     public function Photo(){

        return $this->belongsTo('App\Photo');
     }


    public function isAdmin(){
        if($this->role->id == 1){
            return true;
        }
            return false;
    }

    public function Orders(){
         return $this->hasMany('App\Order');
    }


    ////////////////relation between user and products (pivot->orders)
    public function products(){

         return $this->belongsToMany('App\Product','orders')->withPivot('user_id', 'product_id');;
    }

    ////////////////relation between user and notification (pivot->user_notifications)
    public function notifications(){

        return $this->belongsToMany('App\Notification','user_notifications')->withPivot('user_id', 'notification_id');;
    }

    public function complaints(){
         return $this->hasMany('App\Complaint');
    }


    public function favoriteProducts(){

        return $this->belongsToMany('App\Product','favorites');
    }


    ////////////////relation between user and packages (pivot->sponsers)
    public function packages(){

        return $this->belongsToMany('App\Package','user_packages');
    }


    ////////////////relation between user and packages (pivot->sponsers)
    public function sponsers(){

        return $this->belongsToMany('App\Sponser','sponser_add','user_id','sponser_id');
    }



}
