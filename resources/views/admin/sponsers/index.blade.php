@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="mt-1">
                @include('flash::message')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">All Sponsers</h4>
                    <div class="table-responsive">
                        <table class="table color-table primary-table text-white">
                            <thead>
                                <tr>

                                  <th>السعر</th>
                                  <th>الوحده</th>
                                  <th>المنتجات</th>
                                    <th>تعديل</th>
                                  <th>حذف</th>
                                </tr>
                            </thead>


                        <tbody>

                            @foreach ($sponsers as $sponser)
                              <tr>

                                    <td>{{$sponser->price}}</td>
                                    <td>{{$sponser->unit}}</td>
                                    <td>@foreach($sponser->products as $product)<p>{{$product->name}}</p>@endforeach</td>

                                   <td><a href="{{route('sponser.edit',$sponser->id)}}">تعديل</a></td>
                                    <td>
                                       <form action="{{route('sponser.destroy',$sponser->id)}}" method="post">
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
    </div>


@endsection


