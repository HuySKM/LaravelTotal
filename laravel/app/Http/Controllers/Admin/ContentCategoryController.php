<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentCategoryModel;

class ContentCategoryController extends Controller
{
    /**
     * Hàm khởi tạo của Class được chạy ngay khi khởi tạo đối tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong Class
     * AdminController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index ()
    {
        $items = DB::table('content_category')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['cats'] = $items;

        return view('admin.content.content.category.index', $data);
    }

    public function create()
    {
        $data = array();
        return view('admin.content.content.category.create', $data);

    }

    public function slugify($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();
        $item = new ContentCategoryModel();
        $item ->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item->save();
        return redirect('admin/content/category');
    }

    public function edit($id)
    {
        $data = array();
        $item = ContentCategoryModel::find($id);
        $data['cat'] = $item;
        return view('admin.content.content.category.edit', $data);

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();
        $item = ContentCategoryModel::find($id);
        $item ->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item->save();
        return redirect('admin/content/category');
    }


    public function delete($id)
    {
        $data = array();
        $item = ContentCategoryModel::find($id);
        $data['cat'] = $item;
        return view('admin.content.content.category.delete', $data);
    }

    public function destroy($id)
    {
        $item = ContentCategoryModel::find($id);
        $item->delete();

        return redirect('admin/content/category');
    }

}
