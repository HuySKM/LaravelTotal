@extends('admin.layouts.glance')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <h1> Thêm mới sản phẩm</h1>
    <div class="row">
        <div class="form-three widget-shadow">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- Create Post Form -->

            <form name ="product" action="{{ url('admin/shop/product') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-8">
                        <select name="cat_id">
                            <option value="0">None</option>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <span class="input-group-btn">
                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                            <a class="btn btn-warning remove-image">
                           <i class="fa fa-remove"></i> Delete
                         </a>
                       </span>
                        <input id="thumbnail" type="text" name="images[]" value="{{ old('images') }}" class="form-control" id="focusedinput" placeholder="Default Input">
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Add Images</label>
                    <div class="col-sm-8">
                        <a id="plus-image" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add New
                        </a></div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceCore" value="{{ old('priceCore') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Sale</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceSale" value="{{ old('priceSale') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-8">
                        <input type="text" name="stock" value="{{ old('stock') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Intro</label>
                    <div class="col-sm-8">
                        <textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('intro') }}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                        <textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('desc') }}</textarea></div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.lfm-btn').filemanager('image', {'prefix':'http://localhost/LaravelTotal/laravel/public/laravel-filemanager'});


            $('#plus-image').on('click', function (e) {
                e.preventDefault();

                var lfm_count = parseInt($('.lfm-btn').length);
                var next = lfm_count+1;

                var html = '';

                for(var i = 0; i < 1000; i++){

                    if ($('#lfm'+next).length < 1) {

                        html += '<div class="form-group">\n' +
                            '                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>\n' +
                            '                    <div class="col-sm-8">\n' +
                            '                        <span class="input-group-btn">\n' +
                            '                         <a id="lfm'+next+'" data-input="thumbnail'+next+'" data-preview="holder'+next+'" class="lfm-btn btn btn-primary">\n' +
                            '                           <i class="fa fa-picture-o"></i> Choose\n' +
                            '                         </a>\n' +
                            '                            <a class="btn btn-warning remove-image">\n' +
                            '                           <i class="fa fa-remove"></i> Delete\n' +
                            '                         </a>\n' +
                            '                       </span>\n' +
                            '                        <input id="thumbnail'+next+'" type="text" name="images[]" value="" class="form-control1" id="focusedinput" placeholder="Default Input">\n' +
                            '                        <img id="holder'+next+'" style="margin-top:15px;max-height:100px;">\n' +
                            '                    </div>\n' +
                            '                </div>';


                        break;
                    } else {
                        next++;
                    }


                }

                var box = $(this).closest('.form-group');

                $( html ).insertBefore( box );

                $('.lfm-btn').filemanager('image', {'prefix':'http://localhost/LaravelTotal/laravel/public/laravel-filemanager'});

            });


            $(body).on('click', '.remove-image', function (e) {
                e.preventDefault();

                $(this).closest('.form-group').remove();

            });


        });

    </script>

@endsection
