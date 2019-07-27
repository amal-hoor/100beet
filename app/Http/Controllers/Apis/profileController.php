<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\OrderCollection;

use App\Product;
use App\Order;
use App\Complaint;
class profileController extends Controller
{



    public function updateProfile(Request $request){

           $validator=Validator::make($request->all(),[
               'name'     => 'required|min:4',
               'email'    => 'required|string|email',
               'mobile'   => 'required|min:6',
               'password' => 'required'

           ]);

           if($validator -> fails()){
               return response()->json(['message'=>$validator->messages()]);
           }

           $user=auth()->user();

           $user->update([
               'name'    => $request->input('name'),
               'email'   => $request->input('email'),
               'password'=> Hash::make($request->input('password')),
               'mobile'  => $request->input('mobile'),
           ]);

           return response()->json(['status'=>201,'message' => 'User Profile Updated', $user]);
    }




    public function storeComplaint(Request $request){

        $validator=Validator::make($request->all(),[

                 'type'    => 'required',
                 'content' => 'required',
                 'name'    => 'required',
                 'mobile'  => 'required',
        ]);

        if($validator->fails()){

            return response()->json(['status'=>500,'message'=>$validator->messages()]);
        }

        Complaint::create([

            'user_id'=> auth()->user()->id,
            'name'   => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'content'=> $request->input('content'),
            'type'   => $request->input('type')

        ]);

        return response()->json(['status'=>201,'message'=>'Complaint Created']);
    }



    public function favoriteProducts(){

          $user=auth()->user();
          //return $user;
          $favoriteProducts=$user->favoriteProducts;

          if($favoriteProducts){
            return response()->json(['status'=> 200 ,'favoriteProducts' => $favoriteProducts]);
          }else{

              return response()->json(['status'=>204 , 'message' => 'No Favourite prodducts']);

          }

    }


    public function reservations(){

      // $products = auth()->user()->products;
       $products_id=Order::where('user_id' , auth()->user()->id)->pluck('product_id')->toArray();
       $products=Product::whereIn('id',$products_id)->get();

       if($products){
        return response()->json(['status'=> 200 ,'reservedProducts' => $products]);
      }else{

          return response()->json(['status'=>204 , 'message' => 'No reserved prodducts']);

      }

    }


}

