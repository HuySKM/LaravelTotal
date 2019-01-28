@extends('admin.layouts.glance')
@section('title')
    Sửa khách hàng
@endsection
@section('content')
    <h1>Sửa khách hàng {{ $customer-> id . ' : ' . $customer->name }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- Create Post Form -->

            <form name ="product" action="{{ url('admin/shop/customer/'. $customer->id) }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$customer->name}}" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control1" id="focusedinput" value="{{$customer->email}}" placeholder="Default Input">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </form>
        </div>
    </div>
@endsection
