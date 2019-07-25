@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="mt-1">
                @include('flash::message')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">All Orders</h4>
                    <div class="table-responsive">
                        <table class="table color-table primary-table text-white">
                            <thead>
                                <tr>
                                  <th>اسم المنتج</th>
                                  <th>السعر القديم</th>
                                  <th>السعر الجديد</th>
                                  <th>الحاله</th>
                                  <th>وقت الانشاء</th>
                                  <th>تعديل</th>
                                  <th>حذف</th>
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

