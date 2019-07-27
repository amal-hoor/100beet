<?php

namespace App\Http\Controllers\Apis;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Offer;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $products = product::latest();
        $categories = Category::all();
        $offers = Offer::all();

        if ($request->input('name')){
            $products = Product::where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->input('category_id')){
            $products = Product::where('category_id', $request->input('category_id'));
        }

        if ($request->input('offer_id')){
            $ids = DB::table('product_offers')->where('offer_id' , $request->input('offer_id'))->pluck('product_id')->toArray();
            $products = $products->whereIn('id' , $ids);
        }

        $products = $products->paginate(15);

        if (count($products) > 0) {
            return response()->json(['status' => 200 ,'products' => $products,'offers'=> $offers ,'categories' => $categories]);
        }

        return response()->json(['status' => 204 ,'message', 'No Associated product', 'categories' => $categories,'offers'=> $offers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);

        $product=[
            'name'        => $product->name,
            'description' => $product->detail,
            'price'       => $product->price,
            'photo_id'    => $product->photo->name,
            'offer'       => $product->offer ? $product->offer->new_price : 'no offer available',
           ];

           return response()->json(['status'=>200,'product',$product]);
    }



}
