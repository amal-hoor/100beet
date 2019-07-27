<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\mail\ResetPassword;
use App\User;

class forgetPasswordController extends Controller
{

    public function checkPassword(Request $request){

        $validator=validator::make($request->all(),[
            'email'           => 'required',
        ]);

        if($validator->fails()){
          return  response()->json(['status' => 500,'message'=>$validator->messages()]);
        }

        $user=User::where('email',$request->input('email'))->first();

        $user->update([
            'verify_code' => Str::random(10),
        ]);

        // Mail::to($user->email)->send(
        //     new ResetPassword($user)
        // );

       return  response()->json(['message'=>'Verification Code is send via email']);

    }//check password function




    public function verifyCode(Request $request){

        $validator=validator::make($request->all(),[
          'verify_code'  => 'required',
          'email'        => 'required',
       ]);

       if($validator->fails()){

          return  response()->json(['status' => 500,'message'=>$validator->messages()]);
       }

       $user=user::where('email',$request->input('email'))->first();

       if($user->verify_code == $request->input('verify_code')){

          return response()->json(['message' => 'varification code is correct']);

       }else{

          return response()->json(['message' => 'varification code isnot correct']);

       }

    }



    public function resetPassword(Request $request){
        //dd($request->all());

        $validator=validator::make($request->all(),[
            'email'           => 'required',
            'password'        => 'required|confirmed',
        ]);

        if($validator->fails()){
            return  response()->json(['status' => 500,'message'=>$validator->messages()]);
        }

        $user=User::where('email',$request->input('email'))->first();
        $user->password=Hash::make($request->input('password'));
        $user->save();

        return response()->json(['status' => 200,'message'=>'passowrd is updated successfully']);
    }//resest password function
}
