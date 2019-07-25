
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('flash::message')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">تعديل الحزمه</h3>
                        </div>

                                <form  method="POST" action="{{route('package.update',$package->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">
                                        <label for="">الاسم</label>
                                        <input type="text" name="name" class="form-control" value="{{$package->name}}">

                                    </div>

                                    <div class="form-group">

                                            <label for="">الوصف</label>
                                            <textarea type="text" name="description" class="form-control">{{$package->description}}</textarea>

                                    </div>


                                    <div class="form-group">
                                            <label for="">السعر</label>
                                            <input type="number" name="price" class="form-control" value="{{$package->price}}">

                                    </div>

                                    <div class="form-group">

                                            <label for="">المده</label>
                                           <select name="duration" class="form-control">
                                                <option value="1 يوم" @if($package->duration=='1 يوم') selected @endif>1 يوم</option>
                                                <option value="7 يوم" @if($package->duration=='7 يوم') selected @endif>7 يوم</option>
                                                <option value="14 يوم" @if($package->duration=='14 يوم') selected @endif>14 يوم</option>
                                           </select>

                                    </div>

                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value="تعديل الحزمه">

                                    </div>
                                </form>


</div>
                </div>
            </div>
        </div>
    </div>

@endsection





