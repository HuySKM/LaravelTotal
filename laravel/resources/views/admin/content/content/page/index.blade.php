@extends('admin.layouts.glance')
@section('title')
   Quản lý trang
@endsection
@section('content')
    <h1>Quản lý trang </h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/content/page/create') }}" class="btn btn-success">Thêm trang</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>View</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <th scope="row">{{$page->id}}</th>
                        <td>{{$page->name}}</td>
                        <td>{{$page->author_id}}</td>
                        <td>{{$page->view}}</td>
                        <td>{{$page->images}}</td>
                        <td>
                            <a href="{{ url('admin/content/page/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/content/page/'. $page->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/content/page/'. $page->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $pages->links() }}
        </div>
    </div>
@endsection