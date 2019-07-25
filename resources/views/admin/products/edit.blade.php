
@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('flash::message')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Update Product</h3>
                        </div>
                                <form  method="POST" action="{{route('product.update',$product->id)}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <h2 class="text-center">Update Product</h2>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Category</label>
                                           <select name="category_id" class='form-control'>

                                            @foreach ($categories as $category)
                                                @if ($product->category->name == $category->name)
                                                  <option value="{{$product->category_id}}" selected>{{$product->category->name}}</option>
                                                @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach


                                           </select>

                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Price</label>
                                            <input type="text" class="form-control" name="price" value="{{$product->price}}">
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Description</label>
                                        <textarea name="description" class='form-control'  rows="5">{{$product->description}}</textarea>

                                    </div>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="col-4">
                                                @if ($product->photo_id)
                                                    <img src="{{asset('/images/'.$product->photo->path)}}" alt="" width="100" height="100" />
                                                @else
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                @endif
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file form-control"> <span class="fileinput-new">Select file</span>
                                                <input type="file" name="photo_id"> </span>
                                        </div>

                                    </div>


                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value="Update Product">

                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>

@endsection
