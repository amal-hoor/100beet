@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-11 m-auto">
            @include('inc.form_errors')
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title">Create User</h3>
                                <form  method="POST" action="{{route('user.store')}}" class="form-material m-t-40" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>Name</label>
                                        <input type="text" class="form-control form-control-line" name="name" placeholder="enter name.....">
                                        </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-line" name="email" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="number" class="form-control form-control-line" name="mobile" placeholder="enter mobile number.....">
                                    </div>
                                    <div class="form-group">
                                            <label>Role</label>
                                            <select name="role_id" class="form-control form-control-line">
                                            @foreach($roles as $role)
                                               <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                            </select>

                                    </div>
                                    <div class="form-group">
                                           <label>Status</label>
                                            <select name="block" class="form-control form-control-line">
                                               <option value="0">block</option>
                                               <option value="1">un block</option>
                                            </select>

                                    </div>
                                    <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="enter password.....">
                                    </div>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span>
                                            <input type="hidden">
                                            <input type="file" name="photo_id"> </span></div>
                                    </div>

                                    <div class="form-group">
                                            <input type="submit" class="form-control" name="submit" value="Create User">
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>

@endsection
