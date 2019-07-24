
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Update Package
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('package.update',$package->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">Update Package</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                                <label for="">الاسم</label>
                                        <input type="text" name="name" class="form-control" value="{{$package->name}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                                    <label for="">الوصف</label>
                                            <textarea type="text" name="description" class="form-control">{{$package->description}}</textarea>
                                            </div>
                                    </div>


                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                                    <label for="">السعر</label>
                                            <input type="number" name="price" class="form-control" value="{{$package->price}}">
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <label for="">المده</label>
                                           <select name="duration" class="form-control">
                                                <option value="1 يوم" @if($package->duration=='1 يوم') selected @endif>1 يوم</option>
                                                <option value="7 يوم" @if($package->duration=='7 يوم') selected @endif>7 يوم</option>
                                                <option value="14 يوم" @if($package->duration=='14 يوم') selected @endif>14 يوم</option>
                                           </select>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-default" name="submit" value="تعديل الحزمه">
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





