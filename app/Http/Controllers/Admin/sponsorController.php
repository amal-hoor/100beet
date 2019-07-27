<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sponser;
use App\User;

class sponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsers=Sponser::all();
        return view('admin.sponsers.index',compact('sponsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.sponsers.create',compact('products'));
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
            'price' => 'required',
            'unit'  => 'required',
        ]);

        $sponser=Sponser::create([
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
        ]);

        $sponser->products()->attach($request->input('product_id'));
        flash('Sponsor Created....');
        return redirect()->route('sponsers.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponser=Sponser::find($id);
        return view('admin.sponsers.edit',compact('sponser'));
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
        request()->validate([
            'price' => 'required',
            'unit'  => 'required',
        ]);

        $sponser=Sponser::find($id);

        $sponser->update([
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
        ]);
        flash('Sponsor Updated....');

        return redirect()->route('sponsers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponser=Sponser::find($id);
        $sponser->delete();
        flash('Sponsor Deleted....');
        return redirect()->back();
    }
}
