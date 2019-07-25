
@extends('layouts.admin')

@section('content')



    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Create Package</h3>
                        </div>

                                <form  method="POST" action="{{route('package.store')}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">

                                          <label for="">الاسم</label>
                                          <input type="text" name="name" class="form-control" placeholder="ادخل اسم الحزمه">

                                    </div>

                                    <div class="form-group">
                                              <label for="">الوصف</label>
                                              <textarea type="text" name="description" class="form-control" placeholder="ادخل وصف الحزمه"></textarea>

                                    </div>

                                    <div class="form-group">

                                              <label for="">السعر</label>
                                              <input type="number" name="price" class="form-control" placeholder="ادخل السعر ">

                                    </div>




                                    <div class="form-group">

                                            <label for="">المده</label>
                                           <select name="duration" class="form-control">
                                                <option value="1 يوم">1 يوم</option>
                                                <option value="7 يوم ">7 يوم</option>
                                                <option value="14 يوم">14 يوم</option>
                                           </select>

                                    </div>


                                    <div class="form-group">
                                            <input type="submit" class="form-control btn-default" name="submit" value="انشاء حزمه جديد">

                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





