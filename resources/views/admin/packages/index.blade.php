@extends('layouts.admin')

@section('content')

@include('flash::message')

<h1>Packages</h1>

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

                                  <th>الاسم</th>
                                  <th>الوصف</th>
                                  <th>السعر</th>
                                  <th>المده</th>
                                  <td>Edit</td>
                                  <td>Delete</td>
                                </tr>
                            </thead>

                    <tbody>


                        <tbody>

                            @foreach ($packages as $package)
                              <tr>

                                    <td>{{$package->name}}</td>
                                    <td>{{$package->description}}</td>
                                    <td>{{$package->price}}</td>
                                    <td>{{$package->duration}}</td>
                              <td><a href="{{route('package.edit',$package->id)}}">Edit</a></td>
                                    <td>
                                       <form action="{{route('package.destroy',$package->id)}}" method="post">
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


