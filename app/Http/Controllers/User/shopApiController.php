<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\Sponser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopApiController extends Controller
{
    public function index(){
        $role=Role::where('name','shop')->first();
        $users=User::where('role_id',$role->id)->with('sponsers')->get();
        foreach($users as $user){
            foreach($user->sponsers as $sponser){
                $products[]=$sponser->products;
            }
        }
        return response()->json(['status' => 200 , 'products' => $products]);
    }

}
