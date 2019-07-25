@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-11 m-auto">
        <div class="mt-1">
            @include('flash::message')
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">All Products</h4>
                <div class="table-responsive">
                    <table class="table color-table primary-table text-white">
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
                                    <img height="50" src="{{asset('/images/'.$product->photo->path)}}" alt="">
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
</div>
<!-- END PAGE BASE CONTENT -->


@endsection



