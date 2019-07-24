<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiLoginController extends Controller
{

    public function Login(request $request)
    {
        $user=user::where('email',request('email'))->first();

        if(isset($user)) {
            if (Hash::check($request->input('password'), $user->password)) {

                if (auth()->attempt(request(['email', 'password']))) {

                    return response()->json(['status' => 200, 'message' => 'Login Successfully', 'user' => $user]);
                }
            } else {
                return response()->json(['status' => 500, 'message' => 'wrong password']);
            }
        }



        return response()->json(['status' => 500, 'message' => 'wrong email']);

    }
}
