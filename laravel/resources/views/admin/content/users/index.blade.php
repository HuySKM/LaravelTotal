@extends('admin.layouts.glance')
@section('title')
    Quản lý Users
@endsection
@section('content')
    <h1>Quản lý Users</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/users/create') }}" class="btn btn-success">Thêm Admins</a>
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
                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{ $admin->id }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ url('admin/users/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/users/'. $admin->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/users/'. $admin->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $admins->links() }}
        </div>
    </div>
@endsection