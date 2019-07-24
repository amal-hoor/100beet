@extends('layouts.admin')

@section('content')

    @include('flash::message')

    <h1>Notifications</h1>

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->

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
                            <th>Content</th>
                            <th>Notified</th>
                            <th>Created at</th>
                        </tr>
                        </thead>

                        <tbody>


                        <tbody>

                        @foreach ($notifications as $notification)
                            <tr>

                                <td>{{$notification->body}}</td>
                                <td>
                                    <ul class="list-group">
                                    @foreach($notification->users as $user)
                                        <li class="list-group-item">{{$user->name}}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>{{$notification->created_at}}</td>

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

