@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-11 m-auto">
        <div class="mt-1">
        @include('flash::message')
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <div class="table-responsive">
                    <table class="table color-table primary-table text-white">
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
</div>
<!-- END PAGE BASE CONTENT -->

@endsection
