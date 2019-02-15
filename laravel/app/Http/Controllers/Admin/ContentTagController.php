<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ContentTagModel;
use Illuminate\Support\Facades\DB;

class ContentTagController extends Controller
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
        $items = DB::table('content_tags')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['tags'] = $items;

        return view('admin.content.content.tag.index', $data);

    }

    public function create()
    {
        $data = array();

        return view('admin.content.content.tag.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = ContentTagModel::find($id);
        $data['tag'] = $item;

        return view('admin.content.content.tag.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = ContentTagModel::find($id);
        $data['tag'] = $item;
        return view('admin.content.content.tag.delete', $data);

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

        ]);

        $input = $request->all();
        $item = new ContentTagModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];


        $item->save();
        return redirect('admin/content/tag');
    }

    public function update(Request $request, $id)
    {
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'author_id' => 'required',
            'view' => 'required',
        ]);

        $input = $request->all();
        $item = ContentTagModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];

        $item->save();
        return redirect('admin/content/tag');

    }

    public function destroy($id)
    {
        $item = ContentTagModel::find($id);
        $item->delete();

        return redirect('admin/content/tag');

    }
}
