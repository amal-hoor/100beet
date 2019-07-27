<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\User;

class packageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::all();
        return view('admin.packages.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('admin.packages.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
       request()->validate([
           'name'        => 'required',
           'description' => 'required',
           'price'       => 'required',
           'duration'    => 'required'

       ]);
     // return $request->all();

       $package=Package::create([
           'name' => $request->input('name'),
           'description' => $request->input('description'),
           'price'     => $request->input('price'),
           'duration'  => $request->input('duration'),

       ]);
       $package->users()->attach($request->input('user_id'));
       flash('Package Created....');
       return redirect()->route('packages.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package=Package::find($id);
        return view('admin.packages.edit',compact('package'));
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
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'duration'    => 'required',

        ]);
        //return $request->all();

        $package=Package::find($id);
        $package->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price'     => $request->input('price'),
            'duration'     => $request->input('duration'),

        ]);
        flash('Package updated....');

        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::find($id);
        $package->delete();
        flash('Package deleted....');
        return back();
    }
}
