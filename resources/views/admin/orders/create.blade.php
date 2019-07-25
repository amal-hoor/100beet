
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Create Order</h3>
                        </div>
                                <form  method="POST" action="{{route('order.store')}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}


                                    <div class="form-group">

                                        <label for="">اسم المنتج</label>
                                          <select name="product_id" class="form-control">
                                              @foreach ($products as $product)
                                                <option value="">اسم منتج</option>
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                              @endforeach
                                          </select>

                                    </div>


                                    <div class="form-group">
                                            <label for="">اسم المستخدم</label>
                                           <select name="user_id" class="form-control">
                                               @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                               @endforeach
                                           </select>
                                    </div>

                                    <div class="form-group">
                                            <label for="">وقت التسليم</label>
                                            <input type="text" class="form-control" name="deliver_time" placeholder="ادخل وقت التسليم">

                                    </div>

                                    <div class="form-group">
                                            <label for=""> العنوان</label>
                                            <input type="text" class="form-control" name="address" placeholder="ادخل العنوان">
                                    </div>

                                    <div class="form-group">

                                            <label for=""> الحاله</label>
                                            <select name="status" class="form-control">
                                               <option value="0">لم يتم الموافقه عليه </option>
                                               <option value="1"> تم الموافقه عليه </option>
                                            </select>

                                    </div>

                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value=" انشاء طلب جديد ">
                                    </div>

                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



