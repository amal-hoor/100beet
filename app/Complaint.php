<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable=['user_id','mobile','name','content','type'];

    public function users(){
        return $this->belongsTo('App\User');
    }
}
