<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable=['name','price','duration','description'];

        public function users()
        {
            return $this->belongsToMany('App\User', 'user_packages');
        }
}


