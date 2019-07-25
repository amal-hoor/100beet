
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">تحديث الطلب</h3>
                        </div>
                                <form  method="POST" action="{{route('order.update',$order->id)}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">

                                            <label for="">اسم المنتج</label>
                                          <select name="product_id" class="form-control">
                                              @foreach ($products as $product)
                                                <option value="{{$product->id}}" @if($product->id == $order->product_id) selected @endif>{{$product->name}}</option>
                                              @endforeach
                                          </select>

                                    </div>


                                    <div class="form-group">

                                            <label for="">اسم المستخدم</label>
                                           <select name="user_id" class="form-control">
                                               @foreach($users as $user)
                                                <option value="{{$user->id}}" @if($user->id == $order->user_id) selected @endif>{{$user->name}}</option>
                                               @endforeach
                                           </select>

                                    </div>

                                    <div class="form-group">

                                            <label for="">وقت التسليم</label>
                                            <input type="text" class="form-control" name="deliver_time" value="{{$order->deliver_time}}">

                                    </div>

                                    <div class="form-group">
                                            <label for=""> العنوان</label>
                                            <input type="text" class="form-control" name="address" value="{{$order->address}}">

                                    </div>

                                    <div class="form-group">
                                            <label for=""> الحاله</label>
                                            <select name="status" class="form-control">
                                               <option value="0" @if($order->status==0) selected @endif>لم يتم الموافقه عليه </option>
                                               <option value="1" @if($order->status==1) selected @endif> تم الموافقه عليه </option>
                                            </select>

                                    </div>

                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value="Update Order">

                                    </div>
                                </form>


            @if($errors->any())

                <div class="alert aler-danger">

                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                </div>

            @endif

@endsection



