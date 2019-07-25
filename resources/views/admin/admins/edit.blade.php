@extends('layouts.admin')

@section('content')


                        <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="row">
                            <div class="col-11 m-auto">

                                @include('inc.form_errors')

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h3 class="card-title">Update Admin</h3>
                                <form  method="POST" action="{{route('admin.update',$user->id)}}" class="form-material m-t-40" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">


                                        <div class="form-group">
                                           <input type="text" class="form-control form-control-line" name="name" value="{{$user->name}}">
                                        </div>


                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                        </div>


                                            <div class="form-group">
                                                <select name="role_id" class="form-control form-control-line">
                                                <option value="{{$user->role_id}}" selected>{{$user->role->name}}</option>
                                                @foreach ($roles as $role)
                                                @if($user->role->name != $role->name)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                                @endforeach
                                                </select>
                                            </div>


                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-line" name="password" value={{$user->password}}>
                                        </div>


                                    <div class="form-group">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="col-4">
                                            @if ($user->photo_id)
                                                <img src="{{asset('/images/'.$user->photo->path)}}" alt="" width="100" height="100" />
                                            @else
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                            @endif
                                            </div>

                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span>
                                                  <input type="hidden">
                                                      <input type="file" name="photo_id"> </span></div>
                                            </div>

                                         </div>



                                        <div class="form-group">
                                            <input type="submit" class="form-control" name="submit" value="Update Admin">
                                        </div>

                                </form>
                            </div>
                        </div>
                            </div>
                        </div>

@endsection
