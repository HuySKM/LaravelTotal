@extends('admin.layouts.glance')
@section('title')
    Quản lý nhãn hiệu sản phẩm
@endsection
@section('content')
    <h1>Quản lý nhãn hiệu sản phẩm</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/brand/create') }}" class="btn btn-success">Thêm Nhãn hiệu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Intro</th>
                    <th>Desc</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->image }}</td>
                        <td>{{ $brand->link }}</td>
                        <td>{{ $brand->intro }}</td>
                        <td>{{ $brand->desc }}</td>
                        <td>
                            <a href="{{ url('admin/shop/brand/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/shop/brand/'. $brand->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/shop/brand/'. $brand->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $brands->links() }}
        </div>
    </div>
@endsection