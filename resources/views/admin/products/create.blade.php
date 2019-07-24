
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Add Product
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="row">
                            <div class="col-xs-12">
                                <form  method="POST" action="{{route('product.store')}}" class="container-fluid form-lacoste" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">Add Product</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                           <select name="category_id" class='form-control'>
                                               <option value="">choose category</option>
                                               @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                               @endforeach


                                           </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="text" class="form-control" name="price" placeholder='price'>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <textarea name="description" class='form-control'  rows="5" placeholder="Product description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>

                                                <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="photo_id">
                                            </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-main" name="submit" value="Add Product">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

@endsection
