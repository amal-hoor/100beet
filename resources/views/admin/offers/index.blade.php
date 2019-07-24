@extends('layouts.admin')

@section('content')

@include('flash::message')

<h1>Offers</h1>

 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>All Offers</h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" >
                            <thead>
                                <tr>
                                  <th>اسم المنتج</th>
                                  <th>السعر القديم</th>
                                  <th>السعر الجديد</th>
                                  <th>الحاله</th>
                                  <th>وقت الانشاء</th>
                                  <td>تعديل</td>
                                  <td>حذف</td>
                                </tr>
                            </thead>

                    <tbody>


                        <tbody>

                            @foreach ($offers as $offer)
                             <tr>

                                    <td> <a href="#"> {{$offer->product->name}}</a></td>
                                    <td>{{$offer->product->price}}</td>
                                    <td>{{$offer->new_price}}</td>
                                    <td>@if($offer->status==0){{'غير مؤكد عليه'}}@else{{'مؤكد عليه'}}@endif</td>
                                    <td>{{$offer->created_at}}</td>
                                    <td><a href="{{route('offer.edit',$offer->id)}}">تعديل</a></td>
                                    <td>
                                        <form action="{{route('offer.destroy',$offer->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="submit" value="حذف" class="btn btn-danger">
                                        </form>
                                    </td>
                             </tr>
                            @endforeach


                        </tbody>
                    </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->


@endsection

