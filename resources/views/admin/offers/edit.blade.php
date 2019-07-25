
@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-sm-11 m-auto">
            @include('inc.form_errors')
            <div class="card">
                <div class="card-body">
                    <div class="no-block p-5">
                        <div>
                            <h3 class="card-title">تحديث العرض</h3>
                        </div>
                                <form  method="POST" action="{{route('offer.update',$offer->id)}}" class="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">
                                        <label>السعر </label>
                                        <input type="text" class="form-control" name="new_price" value="{{$offer->new_price}}">

                                    </div>
                                    <div class="form-group">
                                        <label>المنتج</label>
                                           <select name="product_id" class="form-control">
                                               @foreach($products as $product)
                                                <option value="{{$product->id}}" @if($product->id == $offer->product_id) selected @endif>{{$product->name}}</option>
                                               @endforeach
                                           </select>

                                    </div>
                                    <div class="form-group">
                                           <label>الحاله</label>
                                           <select name="status" class="form-control">

                                                <option value="0" @if($offer->status == 0) selected @endif>غير مؤكد</option>
                                                <option value="1"  @if($offer->status == 1) selected @endif>مؤكد</option>

                                           </select>

                                    </div>
                                    <div class="form-group">

                                            <input type="submit" class="form-control btn-danger" name="submit" value="تعديل العرض">

                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



