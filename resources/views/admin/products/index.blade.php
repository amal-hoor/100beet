@extends('layouts.admin')

@section('content')
@include('flash::message')

<h1>All Products</h1>

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>All Products</h1>
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
                            <th>Product name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Top Add</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)

                            <tr>
                                <td> {{$product->name}} </td>
                                <td>
                                    @if($product->photo)
                                    <img height="50" src="/images/{{$product->photo->path}}" alt="">
                                    @else {{'no image'}}
                                    @endif
                                </td>
                                <td> {{$product->price}}</td>
                                <td> {{$product->category ? $product->category->name : null}} </td>
                                <td> {{$product->description}}</td>
                                <td>
                                <form action="{{route('product.updatetopadd',$product->id)}}" method="post">
                                           @csrf
                                           <input type="hidden" value="PATCH" name='_method'>
                                            @if($product->top_ad == 1)
                                            <input type="hidden" name="top_add" value='0'>
                                            <input name="" class="btn btn-link" type="submit" value="Delete from top add">
                                            @else
                                            <input type="hidden" name="top_add" value='1'>
                                            <input name="" class="btn btn-link" type="submit" value="Add to top add">
                                            @endif
                                    </form>
                                </td>
                                <td><a href="{{route('product.edit',$product->id)}}">Edit</a></td>
                                <td>

                                <form action="{{route('product.destroy',$product->id)}}" method="post">
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
<!-- END PAGE BASE CONTENT -->


@endsection



