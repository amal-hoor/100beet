@extends('layouts.admin')

@section('content')

@include('flash::message')

<h1>Categories</h1>

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>All Categories</h1>
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
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Created_at</th>
                                  <td>Edit</td>
                                  <td>Delete</td>
                                </tr>
                              </thead>

                    <tbody>


                        <tbody>


                            @if($categories)

                            @foreach ($categories as $category)
                             <tr>
                                    <td>{{$category->id}}</td>
                                    <td> <a href="#"> {{$category->name}}</a></td>
                                    <td>{{$category->created_at ? $category->created_at->diffForhumans() : 'No Date'}}</td>
                                    <td><a href="{{route('category.edit',$category->id)}}">Edit</a></td>
                                    <td>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                             </tr>
                            @endforeach

                            @endif

                        </tbody>
                    </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->


@endsection

