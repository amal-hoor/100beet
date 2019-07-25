@extends('layouts.admin')

@section('content')

    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="mt-1">
                @include('flash::message')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">All Admins</h4>
                    <div class="table-responsive">
                        <table class="table color-table primary-table text-white">
                            <thead>
                                <tr>

                                  <th>الاسم</th>
                                  <th>الوصف</th>
                                  <th>السعر</th>
                                  <th>المده</th>
                                  <th>تعديل</th>
                                  <th>حذف</th>
                                </tr>
                            </thead>

                    <tbody>


                        <tbody>

                            @foreach ($packages as $package)
                              <tr>

                                    <td>{{$package->name}}</td>
                                    <td>{{$package->description}}</td>
                                    <td>{{$package->price}}</td>
                                    <td>{{$package->duration}}</td>
                              <td><a href="{{route('package.edit',$package->id)}}">تعديل</a></td>
                                    <td>
                                       <form action="{{route('package.destroy',$package->id)}}" method="post">
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


