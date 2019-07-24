
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Create Order
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('order.store')}}" class="" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">Create Order</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">اسم المنتج</label>
                                          <select name="product_id" class="form-control">
                                              @foreach ($products as $product)
                                                <option value="">اسم منتج</option>
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">اسم المستخدم</label>
                                           <select name="user_id" class="form-control">
                                               @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">وقت التسليم</label>
                                            <input type="text" class="form-control" name="deliver_time" placeholder="ادخل وقت التسليم">
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for=""> العنوان</label>
                                            <input type="text" class="form-control" name="address" placeholder="ادخل العنوان">
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for=""> الحاله</label>
                                            <select name="status" class="form-control">
                                               <option value="0">لم يتم الموافقه عليه </option>
                                               <option value="1"> تم الموافقه عليه </option>
                                            </select>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-default" name="submit" value=" انشاء طلب جديد ">
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



