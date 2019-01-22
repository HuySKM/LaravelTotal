<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ContentPageModel;
use Illuminate\Support\Facades\DB;

class ContentPageController extends Controller
{
    public function index()
    {
        $items = DB::table('content_pages')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['pages'] = $items;

        return view('admin.content.content.page.index', $data);

    }

    public function create()
    {
        $data = array();

        return view('admin.content.content.page.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = ContentPageModel::find($id);
        $data['page'] = $item;

        return view('admin.content.content.page.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = ContentPageModel::find($id);
        $data['page'] = $item;
        return view('admin.content.content.page.delete', $data);

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
        $item = new ContentPageModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];


        $item->save();
        return redirect('admin/content/page');
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
        $item = ContentPageModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];

        $item->save();
        return redirect('admin/content/page');

    }

    public function destroy($id)
    {
        $item = ContentPageModel::find($id);
        $item->delete();

        return redirect('admin/content/page');

    }
}
