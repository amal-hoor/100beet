
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Create Sponser</h3>
                        </div>

                        <form  method="POST" action="{{route('sponser.store')}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">

                                              <label for="">السعر</label>
                                              <input type="number" name="price" class="form-control" placeholder="ادخل السعر">

                                    </div>

                                   <div class="form-group">

                                               <label for="">الوحده</label>
                                              <input type="text" name="unit" class="form-control" placeholder="ادخل الوحده">

                                    </div>


                                    <div class="form-group">
                                              <input type="submit" value="انشاء" class="form-control btn btn-danger">
                                    </div>

                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





