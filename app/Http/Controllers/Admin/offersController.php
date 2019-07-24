<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Offer;
use App\Product;
use App\Notification;
use App\User;

class offersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=offer::all();
        return view('admin.offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.offers.create',compact('products'));
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

            'new_price' => 'required',
            'product_id'=> 'required',
            'status'    => 'required'

        ]);

        $offers_number=Offer::count();

        if($offers_number < 100){

            $offer=Offer::create([
                'product_id' => $request->input('product_id'),
                'new_price'  => $request->input('new_price'),
                'status'     => $request->input('status'),
            ]);

            $notification=Notification::create([
                'body' => 'تم اضافه عرض جديد',
                'offer_id' => $offer->id,
            ]);

            $users=User::where('role_id','!=',1)->get();
            $notification->users()->attach($users);

        }

        flash('Offer Added....');
        return redirect()->route('offers.index');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer=Offer::find($id);
        $products=Product::all();
        return view('admin.offers.edit',compact('offer','products'));
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

            'new_price' => 'required',
            'product_id'=> 'required',
            'status'    => 'required'

        ]);

        $offer=Offer::find($id);
        $offer->update([
            'product_id' => $request->input('product_id'),
            'new_price'  => $request->input('new_price'),
            'status'     => $request->input('status')
        ]);

        $notification=Notification::create([
            'body' => 'تم تعديلع العرض ',
            'offer_id' => $offer->id,
        ]);

        $users=User::where('role_id','!=',1)->get();
        $notification->users()->attach($users);


        flash('Offer Updated....');
        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer=Offer::find($id);
        $offer->delete();
        flash('Offer Deleted....');
        return back();
    }
}
