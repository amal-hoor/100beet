<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Photo;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(20);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'price'       => 'required',
            'description' => 'required'
        ]);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('/images',$name);
            $photo=Photo::create(['path'=>$name]);
        }

        Product::create([
              'name'        => $request->input('name'),
              'category_id' => $request->input('category_id'),
              'price'       => $request->input('price'),
              'description' => $request->input('description'),
              'photo_id'    => isset($photo)  ? $photo->id : 0,
        ]);

        flash('Product Added....');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTopAdd(Request $request,$id)
    {

       $products=Product::where('top_ad',1)->get();

       if($products->count() < 4){

        $product=Product::find($id);
        $product->update(['top_ad'=>$request->input('top_add')]);

       }

       if($products->count() == 4){

            if($request->input('top_add') == 1){
                flash('Not Allowed...');
            }

            if($request->input('top_add') == 0){
                $product=Product::find($id);
                $product->update(['top_ad'=>$request->input('top_add')]);
            }
       }

       return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);


        request()->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'price'       => 'required',
            'description' => 'required'
        ]);


        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
            $product->photo_id = $photo->id;
            $product->update();
        }

        $product->update([
            'name'           =>   $request->input('name'),
            'category_id'    =>   $request->input('category_id'),
            'price'          =>   $request->input('price'),
            'description'    =>   $request->input('description'),
        ]);

        //return $product;
        flash('Product Updated....');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id)->delete();
        flash('Product Deleted....');
        return redirect('/admin/products');
    }
}

