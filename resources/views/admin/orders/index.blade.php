@extends('layouts.admin')

@section('content')

@include('flash::message')

<h1>Orders</h1>

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>All Orders</h1>
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
                                  <th>Product Name</th>
                                  <th>User Name</th>
                                  <th>Deliver Time</th>
                                  <th>Address</th>
                                  <th>status</th>
                                  <th>Created_at</th>
                                  <td>Edit</td>
                                  <td>Delete</td>
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


@endsection

