@extends('admin.layouts.glance')
@section('title')
    Xóa Menu Items
@endsection
@section('content')
    <h1>Xóa Menu Items {{ $menu-> id . ' : ' . $menu->name }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name ="menuitems" action="{{ url('admin/menuitems/'. $menu->id.'/delete') }}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Delete</button>

                </div>
            </form>
        </div>
    </div>
@endsection