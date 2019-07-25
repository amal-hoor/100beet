
@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-sm-11 m-auto">
        @include('inc.form_errors')
        <div class="card">
            <div class="card-body">
                <div class="no-block p-5">
                    <div>
                        <h3 class="card-title">Create Product</h3>
                    </div>
                                <form  method="POST" action="{{route('product.store')}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group m-t-40 row">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="enter name.....">
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Category</label>
                                        <select name="category_id" class='form-control'>
                                               <option value="">choose category</option>
                                               @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                               @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" placeholder='enter price.....'>
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label>Description</label>
                                        <textarea name="description" class='form-control'  rows="5" placeholder="product description....."></textarea>
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span>
                                            <input type="file" name="photo_id"> </span>
                                        </div>
                                    </div>

                                    <div class="form-group m-t-40 row">
                                            <input type="submit" class="form-control btn-danger" name="submit" value="Create Product">
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
</div>

@endsection
