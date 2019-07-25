
@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('flash::message')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Update Sponser</h3>
                        </div>

                                <form  method="POST" action="{{route('sponser.update',$sponser->id)}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">

                                            <label for="">السعر</label>
                                            <input type="number" name="price" class="form-control" value="{{$sponser->price}}">

                                    </div>

                                    <div class="form-group">
                                              <label for="">الوحده</label>
                                              <input type="text" name="unit" class="form-control" value={{$sponser->unit}}>

                                    </div>


                                    <div class="form-group">

                                              <input type="submit" value="تحديث" class="form-control btn btn-danger">

                                    </div>

                                </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





