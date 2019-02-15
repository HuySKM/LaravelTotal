<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ContentPostModel;
use App\Model\Admin\ContentCategoryModel;
use Illuminate\Support\Facades\DB;


class ContentPostController extends Controller
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

    public function index()
    {
        $items = DB::table('content_posts')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['posts'] = $items;

        return view('admin.content.content.post.index', $data);

    }

    public function create()
    {
        $data = array();
        $cats = ContentPostModel::all();
        $data['cats'] = $cats;
        return view('admin.content.content.post.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = ContentPostModel::find($id);
        $data['post'] = $item;

        $cats = ContentCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.content.post.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = ContentPostModel::find($id);
        $data['post'] = $item;
        return view('admin.content.content.post.delete', $data);

    }


    public function store(Request $request)
    {
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'author_id' => 'required',
            'view' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',

        ]);

        $input = $request->all();
        $item = new ContentPostModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item ->cat_id = $input['cat_id'];

        $item->save();
        return redirect('admin/content/post');
    }

    public function update(Request $request, $id)
    {
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'author_id' => 'required',
            'view' => 'required',
        ]);

        $input = $request->all();
        $item = ContentPostModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item ->cat_id = $input['cat_id'];

        $item->save();
        return redirect('admin/content/post');

    }

    public function destroy($id)
    {
        $item = ContentPostModel::find($id);
        $item->delete();

        return redirect('admin/content/post');

    }
}
