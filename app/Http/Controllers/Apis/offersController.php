<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferCollection;
use Illuminate\Support\Facades\Validator;
use App\Offer;
use App\Sponser;
use App\Order;

class offersController extends Controller
{
    public function index(){

        $offers=Offer::paginate(20);
        $count=$offers->count();
        $sponsers=Sponser::all();
        return response()->json(['status'=>200,'sponsers' => $sponsers,'offers' => $offers,'count'=>$count]);
    }



    /////////////////////reserve product
    public function reserveProduct(Request $request,$id){

            $input=$request->all();

            $validator=Validator::make($request->all(), [
                'deliver_time'  => 'required',
                'address'       => 'required',
                'product_id'    => 'required',
             ]);

             if ($validator->fails()) {
               return response()->json(['status' => 500 , 'message' => $validator->messages()]);
            }
            //return $request->all();

            $offer=offer::find($id);

            Order::create([
               'user_id'         => auth()->user()->id,
               'product_id'      =>$request->input('product_id'),
               'status'          => 0,
               'deliver_time'    => $request->input('deliver_time'),
               'address'         => $request->input('address'),
            ]);

            return response()->json(['status' => 201 ,'message' => 'Order Created']);
       }



}
