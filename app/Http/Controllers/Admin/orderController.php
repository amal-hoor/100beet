<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use App\Role;
use App\Product;
use App\Notification;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::where('role_id','2')->get();//////with role = user
        $products=Product::all();
        return view('admin.orders.create',compact('users','products'));
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

            'product_id'   => 'required',
            'user_id'      => 'required',
            'address'      => 'required',
            'deliver_time' => 'required',

        ]);

        $order=Order::create([
            'product_id'   => $request->input('product_id'),
            'user_id'      => $request->input('user_id'),
            'address'      => $request->input('address'),
            'deliver_time' => $request->input('deliver_time'),
            'status'       => $request->input('status'),
        ]);

        $notification=Notification::create([
            'order_id' => $order->id,
            'body'     => 'تم انشاء طلب جديد',
        ]);

        $user= User::where('id',$request->input('user_id'))->get();

        $notification->users()->attach($user);
        flash('Order Created....');

        return redirect()->route('orders.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        $role=Role::where('name','user')->first();
        $users=User::where('role_id',$role->id)->get();//////with role = user
        $products=Product::all();
        return view('admin.orders.edit',compact('order','users','products'));
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

            'product_id'   => 'required',
            'user_id'      => 'required',
            'address'      => 'required',
            'deliver_time' => 'required',

        ]);

        $order=Order::find($id);

        $order->update([

            'product_id'   => $request->input('product_id'),
            'user_id'      => $request->input('user_id'),
            'address'      => $request->input('address'),
            'deliver_time' => $request->input('deliver_time'),
            'status'       => $request->input('status'),

        ]);

        $notificaion=Notification::create([

            'body' => 'تم تعديل الطلب',
            'order_id' => $order->id,

        ]);


        $user= User::where('id',$request->input('user_id'))->get();

        $notificaion->users()->attach($user);

        flash('Order Updated....');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $notification=Notification::create([

            'body' => 'تم الغاء الطلب',
            'order_id' => $order->id,

        ]);
        $user=User::where('id',$order->user_id)->first();
        $notification->users()->attach($user);

        $order->delete();
        flash('Order Deleted....');
        return back();
    }
}

