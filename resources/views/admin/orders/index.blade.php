@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-11 m-auto">
        <div class="mt-1">
            @include('flash::message')
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">All Orders</h4>
                <div class="table-responsive">
                    <table class="table color-table primary-table text-white">
                            <thead>
                                <tr>
                                  <th>Product Name</th>
                                  <th>User Name</th>
                                  <th>Deliver Time</th>
                                  <th>Address</th>
                                  <th>status</th>
                                  <th>Created_at</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                                </tr>
                            </thead>

                    <tbody>


                        <tbody>

                            @foreach ($orders as $order)
                              <tr>

                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->user ? $order->user->name : "No User"}}</td>
                                    <td>{{$order->deliver_time}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>@if($order->status==1){{'Approved'}}@else{{'Unapproved'}}@endif</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{route('order.edit',$order->id)}}">Edit</a></td>
                                    <td>
                                       <form action="{{route('order.destroy',$order->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="submit" value="Delete" class="btn btn-danger">
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
</div>


@endsection

