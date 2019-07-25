@extends('layouts.admin')

@section('content')
    <div class="row">

    <div class="col-lg-5 m-auto">
        <form  method="POST" action="{{route('category.store')}}" class="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                    <h2 class="text-center">Create Category</h2>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="enter name.....">
            </div>
            <div class="form-group">
                    <input type="submit" class="form-control btn-danger" name="submit" value="Add Category">
            </div>
        </form>

    </div>

    <div class="col-lg-6 m-auto">
        <div class="mt-1">
            @include('flash::message')
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">All Categories</h4>
                <div class="table-responsive">
                    <table class="table color-table primary-table text-white">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Created_at</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                                </tr>
                            </thead>


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

