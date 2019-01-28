@extends('admin.layouts.glance')
@section('title')
    Xóa khách hàng
@endsection
@section('content')
    <h1>Xóa khách hàng {{ $shop_customers-> id . ' : ' . $shop_customers->name }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name ="product" action="{{ url('admin/shop/customer/'. $shop_customers->id.'/delete') }}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Delete</button>

                </div>
            </form>
        </div>
    </div>
@endsection

