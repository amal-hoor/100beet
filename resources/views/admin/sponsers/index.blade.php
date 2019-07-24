@extends('layouts.admin')

@section('content')

@include('flash::message')

<h1>Sponsers</h1>

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
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

                                  <th>السعر</th>
                                  <th>الوحده</th>
                                  <th>المنتجات</th>
                                  <td>Edit</td>
                                  <td>Delete</td>
                                </tr>
                            </thead>

                    <tbody>


                        <tbody>

                            @foreach ($sponsers as $sponser)
                              <tr>

                                    <td>{{$sponser->price}}</td>
                                    <td>{{$sponser->unit}}</td>
                                    <td>@foreach($sponser->products as $product)<p>{{$product->name}}</p>@endforeach</td>

                                   <td><a href="{{route('sponser.edit',$sponser->id)}}">Edit</a></td>
                                    <td>
                                       <form action="{{route('sponser.destroy',$sponser->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="submit" value="حذف" class="btn btn-danger">
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


