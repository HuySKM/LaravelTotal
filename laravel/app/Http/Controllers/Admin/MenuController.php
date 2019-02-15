<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\MenuModel;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Hàm khởi tạo của Class được chạy ngay khi khởi tạo đối tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong Class
     * AdminController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

        $locations = MenuModel::getMenuLocations();

        view()->share('locations', $locations);
    }

    public function index()
    {
        $items = DB::table('menus')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['menus'] = $items;

        return view('admin.content.menu.index', $data);

    }

    public function create()
    {
        $data = array();

        return view('admin.content.menu.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = MenuModel::find($id);
        $data['menu'] = $item;

        return view('admin.content.menu.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = MenuModel::find($id);
        $data['menu'] = $item;
        return view('admin.content.menu.delete', $data);

    }


    public function store(Request $request)
    {
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',

        ]);

        $input = $request->all();
        $item = new MenuModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->desc = $input['desc'];
        $item ->location = isset($input['location']) ? $input['location'] :0;


        $item->save();
        return redirect('admin/menu');
    }

    public function update(Request $request, $id)
    {
        ([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',

        ]);

        $input = $request->all();
        $item = MenuModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->desc = $input['desc'];
        $item ->location = isset($input['location']) ? $input['location'] :0;

        $item->save();
        return redirect('admin/menu');

    }

    public function destroy($id)
    {
        $item = MenuModel::find($id);
        $item->delete();

        return redirect('admin/menu');

    }
}
