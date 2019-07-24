
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Update Order
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('order.update',$order->id)}}" class="" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">تحديث الطلب</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">اسم المنتج</label>
                                          <select name="product_id" class="form-control">
                                              @foreach ($products as $product)
                                                <option value="{{$product->id}}" @if($product->id == $order->product_id) selected @endif>{{$product->name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">اسم المستخدم</label>
                                           <select name="user_id" class="form-control">
                                               @foreach($users as $user)
                                                <option value="{{$user->id}}" @if($user->id == $order->user_id) selected @endif>{{$user->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">وقت التسليم</label>
                                            <input type="text" class="form-control" name="deliver_time" value="{{$order->deliver_time}}">
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for=""> العنوان</label>
                                            <input type="text" class="form-control" name="address" value="{{$order->address}}">
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for=""> الحاله</label>
                                            <select name="status" class="form-control">
                                               <option value="0" @if($order->status==0) selected @endif>لم يتم الموافقه عليه </option>
                                               <option value="1" @if($order->status==1) selected @endif> تم الموافقه عليه </option>
                                            </select>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-default" name="submit" value="Update Order">
                                        </div>
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



