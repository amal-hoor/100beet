@extends('layouts.admin')

@section('content')

<!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-11 m-auto">
                            <div class="mt-1">
                            @include('flash::message')
                            </div>
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h4 class="card-title">All Admins</h4>
                                    <div class="table-responsive">
                                        <table class="table color-table primary-table text-white">
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
                    </div>
<!-- END PAGE BASE CONTENT -->
@endsection


