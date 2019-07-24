@extends('layouts.admin')

@section('content')
 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Admins</h1>
    </div>
    <!-- END PAGE TITLE -->

</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row" style="margin-top:100px;">
    <div class="col-md-12">

    @include('flash::message')
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th>Admin name</th>
                            <th> Photo </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)


                            <tr>
                                <td> {{$user->name}} </td>
                                <td>@if($user->photo)<img src="{{asset('/images/'.$user->photo->path)}}" width="60" height="60"> @else "No Image available" @endif</td>
                                <td> {{$user->email}}</td>
                                <td> {{$user->role->name}}</td>
                                <td><a href="{{route('admin.edit',$user->id)}}">Edit</a></td>

                                <td>

                                     <form action="{{route('admin.destroy',$user->id)}}" method="post">
                                       {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" value="delete" class="btn btn-danger">
                                     </form>
                                </td>

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


