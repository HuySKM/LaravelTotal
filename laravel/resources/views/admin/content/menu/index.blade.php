@extends('admin.layouts.glance')
@section('title')
    Quản lý Menu
@endsection
@section('content')
    <h1>Quản lý Menu</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/menu/create') }}" class="btn btn-success">Thêm Menu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <th scope="row">{{$menu->id}}</th>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->location}}</td>
                        <td>
                            <a href="{{ url('admin/menu/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/menu/'. $menu->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/menu/'. $menu->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $menus->links() }}
        </div>
    </div>
@endsection