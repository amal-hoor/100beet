
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Create Sponsor
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('sponser.store')}}" class="" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">Create Sponsor</h2>
                                        </div>
                                    </div>


                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                                    <label for="">السعر</label>
                                              <input type="number" name="price" class="form-control" placeholder="ادخل السعر">
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                                    <label for="">الوحده</label>
                                              <input type="text" name="unit" class="form-control" placeholder="ادخل الوحده">
                                            </div>
                                    </div>


                                    <div class="row">
                                            <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">

                                              <input type="submit" value="انشاء" class="form-control">
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





