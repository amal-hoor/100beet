
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Add Category
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('category.store')}}" class="" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">Add Category</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-info" name="submit" value="Add Category">
                                        </div>
                                    </div>
                                </form>

@endsection



