
@extends('layouts.admin')

@section('content')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Update Category
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="row">
                            <div class="col-xs-12">
                                <form  method="POST" action="{{route('category.update',$category->id)}}" class="container-fluid form-lacoste" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <h2 class="text-center">Update Category</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                           <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important;">
                                            <input type="submit" class="form-control btn-info" name="submit" value="Update Category">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

@endsection



