@extends('admin.layouts.glance')
@section('title')
    Xóa Tags
@endsection
@section('content')
    <h1>Xóa Tags {{ $tag-> id . ' : ' . $tag->name }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name ="tag" action="{{ url('admin/content/tag/'. $tag->id.'/delete') }}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Delete</button>

                </div>
            </form>
        </div>
    </div>
@endsection