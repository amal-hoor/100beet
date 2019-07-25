
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">Create Offer</h3>
                        </div>
                                <form  method="POST" action="{{route('offer.store')}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                           <label>السعر الجديد</label>
                                            <input type="text" class="form-control" name="new_price" placeholder="ادخل السعر الجديد">

                                    </div>
                                    <div class="form-group">
                                           <label>اسم المنتج</label>
                                           <select name="product_id" class="form-control">
                                               @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                               @endforeach
                                           </select>

                                    </div>
                                    <div class="form-group">
                                               <label>الحاله</label>
                                               <select name="status" class="form-control">

                                                    <option value="1">{{'مؤكد عليه'}}</option>
                                                    <option value="0">{{'غير مؤكد عليه'}}</option>

                                               </select>
                                    </div>
                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value="اضافه عرض">

                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



