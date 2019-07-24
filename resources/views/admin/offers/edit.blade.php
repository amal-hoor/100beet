
@extends('layouts.admin')

@section('content')

@include('flash::message')

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>
                                    Add Offer
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                    </div>
                        <!-- END PAGE HEAD-->

                        <!-- BEGIN PAGE BASE CONTENT -->

                                <form  method="POST" action="{{route('offer.update',$offer->id)}}" class="" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <h2 class="text-center">تعديل العرض</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                        <input type="text" class="form-control" name="new_price" value="{{$offer->new_price}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                           <select name="product_id" class="form-control">
                                               @foreach($products as $product)
                                                <option value="{{$product->id}}" @if($product->id == $offer->product_id) selected @endif>{{$product->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                           <select name="status" class="form-control">

                                                <option value="0" @if($offer->status == 0) selected @endif>غير مؤكد</option>
                                                <option value="1"  @if($offer->status == 1) selected @endif>مؤكد</option>

                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3" style="float:right !important">
                                            <input type="submit" class="form-control btn-info" name="submit" value="تعديل العرض">
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



