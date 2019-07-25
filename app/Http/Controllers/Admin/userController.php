<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Photo;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role_id','!=',1)->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));
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

            'name'     => 'required|max:255',
            'email'    => 'required|unique:users',
            'role_id'  => 'required',
            'password' => 'required|min:6',
            'mobile'   => 'required|min:6',
            'block'    => 'required',
        ]);

        if($file=$request->file('photo_id')){

           $name=$file->getClientOriginalName();
           $file->move('images',$name);
           $photo=Photo::create(['path'=>$name]);

        }

        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'role_id'  => $request->input('role_id'),
            'password' => $request->input('password'),
            'mobile'   => $request->input('mobile'),
            'block'    => $request->input('block'),
            'photo_id' => isset($photo) ? $photo->id : 0,
         ]);
         flash('User Created...');

         return redirect()->route('users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles'));
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
       $user=User::find($id);

       request()->validate([

        'name'     => 'required|max:255',
        'email'    => 'required',
        'role_id'  => 'required',
        'password' => 'required|min:6',
        'mobile'   => 'required|min:6',
        'block'    => 'required',

       ]);


       if($file=$request->file('photo_id')){

        $name=$file->getClientOriginalName();
        $file->move('images',$name);
        $photo=Photo::create(['path'=>$name]);

     }

       $user->update([
           'name'     => $request->input('name'),
           'email'    => $request->input('email'),
           'role_id'  => $request->input('role_id'),
           'password' => $request->input('password'),
           'mobile'   => $request->input('mobile'),
           'block'    => $request->input('block'),
           'photo_id' => isset($photo) ? $photo->id : $user->photo_id,

        ]);
        flash('User Updated...');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        flash('User Deleted...');
        return back();
    }
}
