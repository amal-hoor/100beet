@extends('layouts.admin')

@section('content')

@include('flash::message')

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Users</h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th> Email </th>
                            <th>Mobile</th>
                            <th>Role</th>
                            <th>User Packages</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)


                            <tr>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td> {{$user->mobile}} </td>
                                <td> {{$user->role->name}}</td>
                                <td>@foreach($user->packages as $package)<p>{{$package->name}}</p>@endforeach</td>


                                <td><a href="{{route('user.edit',$user->id)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                       {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="delete" class="btn btn-danger">
                                     </form>
                                </td>
                                <td>@if($user->block == 0){{'Blocked'}}@else {{'unBlocked'}} @endif </td>
                            </tr>


                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->

@endsection
