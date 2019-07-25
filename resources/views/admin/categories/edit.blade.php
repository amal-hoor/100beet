
@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-6 m-auto">

            @include('inc.form_errors')

            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title">Update Category</h3>
                                <form  method="POST" action="{{route('category.update',$category->id)}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                           <label>Name</label>
                                           <input type="text" class="form-control form-control-inline" name="name" value="{{$category->name}}">

                                    </div>
                                    <div class="form-group">
                                            <input type="submit" class="form-control btn-danger" name="submit" value="Update Category">
                                    </div>
                                </form>
                            </div>
            </div>
        </div>
    </div>

@endsection



