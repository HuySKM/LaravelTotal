@extends('admin.layouts.glance')
@section('title')
    Thêm mới Khách hàng
@endsection
@section('content')
    <h1> Thêm mới Khách hàng</h1>
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

            <form name ="customer" action="{{ url('admin/shop/customer') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
               {{-- <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Customer Name</label>
                    <div class="col-sm-8">
                        <select name="cat_id">
                            <option value="0">None</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>--}}
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </form>
        </div>
    </div>
@endsection
