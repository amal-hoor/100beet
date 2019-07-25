@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="mt-1">
                @include('flash::message')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">All Sponsers</h4>
                    <div class="table-responsive">
                        <table class="table color-table primary-table text-white">
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
                                    <ul class="list list-unstyled">
                                    @foreach($notification->users as $user)
                                        <li class="list-items">{{$user->name}}</li>
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

    </div>
@endsection

