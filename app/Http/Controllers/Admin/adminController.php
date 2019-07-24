<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Photo;
use App\Role;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id' , '=' ,1)->get();
        return view('admin.admins.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.admins.create',compact('roles'));
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
            'name'     => 'required|max:255|string',
            'email'    => 'required|unique:users',
            'password' => 'required|min:6',
            'role_id'  => 'required',
        ]);

        $user=Auth::user();

        if($user->isAdmin()){
            if($file=$request->file('photo_id')){
                $name=$file->getClientOriginalName();
                $file->move('images',$name);
                $photo=Photo::create(['path'=>$name]);
            }
            User::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id'  =>$request->input('role_id'),
                'photo_id' => isset($photo) ? $photo->id : 0,
            ]);
            flash('Admin Added....');
            return redirect()->route('admin.index');
        }
       flash('Not Allowed....');
       return redirect()->route('admin.create');

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
        return view('admin.admins.edit',compact('user','roles'));
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
            'name'     => 'required|max:255|string',
            'email'    => 'required',
            'password' => 'required|min:6',
            'role_id'  => 'required',
        ]);

        $user=User::find($id);

        if($file=$request->file('photo_id')){
            $name=$file->getClientOriginalName();
            $file->move('/images',$name);
            $photo=Photo::create(['path'=>$name]);
        }

        $user->update([
            'name'     =>   $request->input('name'),
            'email'    =>   $request->input('email'),
            'password' =>   $request->input('password'),
            'role_id'  =>   $request->input('role_id'),
            'photo_id' =>   isset($photo) ? $photo->id : 0,
        ]);
        flash('Admin Updated');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id)->delete();
        flash('Admin Deleted....');
        return redirect()->back();
    }

}
