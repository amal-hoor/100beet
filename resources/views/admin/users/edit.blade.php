@extends('layouts.admin')

@section('content')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Update User
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="row">
                            <div class="col-xs-12" style="float:right !important;">
                                <form  method="POST" action="{{route('user.update',$user->id)}}" class="container-fluid form-lacoste" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <h2 class="text-center">Update User</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <input type="number" class="form-control" name="mobile" value="{{$user->mobile}}">
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <select name="role_id" class="form-control">
                                            @foreach($roles as $role)
                                               <option value="{{$role->id}}" @if($user->role->name == $role->name) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <select name="block" class="form-control">

                                               <option value="0" @if($user->block==0) selected @endif>block</option>
                                               <option value="1" @if($user->block==1) selected @endif>un block</option>

                                            </select>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <input type="password" class="form-control" name="password" value={{$user->password}}>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    @if ($user->photo_id)
                                                    <img src="/images/{{$user->photo->path}}" alt="" width="100" height="100"/>
                                                    @else
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    @endif
                                                </div>

                                            <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="photo_id">
                                            </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <input type="submit" class="form-control btn-main" name="submit" value="Update User">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                            @endforeach
                        @endif


@endsection
