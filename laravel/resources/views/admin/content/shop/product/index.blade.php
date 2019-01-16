@extends('admin.layouts.glance')
@section('title')
    Quản lý sản phẩm
@endsection
@section('content')
    <h1>Quản lý sản phẩm</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/product/create') }}" class="btn btn-success">Thêm Sản phẩm</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Images</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->cat_id}}</td>
                        <td>{{$product->images}}</td>
                        <td>{{$product->priceCore}}</td>
                        <td>{{$product->priceSale}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <a href="{{ url('admin/shop/product/create') }}" class="btn btn-success">Add</a>
                            <a href="{{ url('admin/shop/product/'. $product->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/shop/product/'. $product->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection