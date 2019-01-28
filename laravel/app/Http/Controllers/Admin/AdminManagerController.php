<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AdminManagerController extends Controller
{
    public function index()
    {
        $items = DB::table('admins')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['admins'] = $items;

        return view('admin.content.users.index', $data);

    }

    public function create()
    {
        $data = array();

        return view('admin.content.users.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = AdminModel::find($id);
        $data['admin'] = $item;

        return view('admin.content.users.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = AdminModel::find($id);
        $data['admin'] = $item;
        return view('admin.content.users.delete', $data);

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
        $item = new AdminModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];


        $item->save();
        return redirect('admin/users');
    }

    public function update(Request $request, $id)
    {
       /* ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'author_id' => 'required',
            'view' => 'required',
        ]);

        $input = $request->all();
        $item = AdminModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item ->view = isset($input['view']) ? $input['view'] : 0;
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];

        $item->save();
        return redirect('admin/users');*/

    }

    public function destroy($id)
    {
        /*$item = AdminModel::find($id);
        $item->delete();

        return redirect('admin/users');*/

    }
}
