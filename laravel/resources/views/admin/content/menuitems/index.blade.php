@extends('admin.layouts.glance')
@section('title')
    Quản lý Menu Items
@endsection
@section('content')
    <h1>Quản lý Menu Items</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/menuitems/create') }}" class="btn btn-success">Thêm Menu Items</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent ID</th>
                    <th>Menu ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menuitems as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ str_repeat('-', $item['level'] - 1) . ' ' . $item['name'] }}</td>
                        <td>{{ $item['parent_id'] }}</td>
                        <td>{{ $item['menu_id'] }}</td>
                        <td>
                            <a href="{{ url('admin/menuitems/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/menuitems/'.$item['id'].'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/menuitems/'.$item['id'].'/delete ') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection