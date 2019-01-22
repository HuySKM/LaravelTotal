@extends('admin.layouts.glance')
@section('title')
    Quản lý Tags
@endsection
@section('content')
    <h1>Quản lý Tags </h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/content/tag/create') }}" class="btn btn-success">Thêm Tags</a>
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
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->author_id}}</td>
                        <td>{{$tag->view}}</td>
                        <td>{{$tag->images}}</td>
                        <td>
                            <a href="{{ url('admin/content/tag/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/content/tag/'. $tag->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/content/tag/'. $tag->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $tags->links() }}
        </div>
    </div>
@endsection