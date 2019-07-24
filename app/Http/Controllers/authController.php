<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class authController extends Controller
{
    public function index(){

        return view('admin.login');
    }



    public function adminLogin(request $request){


        $user=user::where('email',request('email'))->first();

        //return $user;

        if(isset($user)){


            if(Hash::check($request->input('password'), $user->password)){

                $password=$user->password;

                if (Auth::attempt(request(['email' , 'password']) , 1)) {
                    return redirect()->route('admin.index');

                }else{

                    return back();

                }
            }

        }

    }



    public function logout(){

         auth()->logout();
         return redirect()->route('admin.login');
    }



}
