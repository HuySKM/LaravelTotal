@extends('admin.layouts.glance')
@section('title')
    Quản lý khách hàng
@endsection
@section('content')
    <h1>Quản lý khách hàng</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/customer/create') }}" class="btn btn-success">Thêm Khách hàng</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ url('admin/shop/customer/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/shop/customer/'. $customer->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/shop/customer/'. $customer->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $customers->links() }}
        </div>
    </div>
@endsection