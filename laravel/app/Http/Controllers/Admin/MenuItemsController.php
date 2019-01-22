<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\MenuModel;
use App\Model\Admin\MenuItemsModel;
use Illuminate\Support\Facades\DB;

class MenuItemsController extends Controller
{
    public function index()
    {
        $items = DB::table('menu_items')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['menuitems'] = $items;

        return view('admin.content.menuitems.index', $data);

    }

    public function create()
    {
        $data = array();
        $data['types'] = MenuItemsModel::getTypeOfMenuItems();
        $data['menus'] = MenuModel::all();

        return view('admin.content.menuitems.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = MenuItemsModel::find($id);
        $data['menuitem'] = $item;

        return view('admin.content.menuitems.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = MenuItemsModel::find($id);
        $data['menuitem'] = $item;
        return view('admin.content.menuitems.delete', $data);

    }


    public function store(Request $request)
    {
        ([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',

        ]);

        $input = $request->all();
        $item = new MenuItemsModel();
        $item ->name = $input['name'];
        $item ->type = isset($input['type']) ? $input['type'] : 0;
        $item ->params = isset($input['params']) ? $input['params'] : '';
        $item ->link = isset($input['link']) ? $input['link'] : '';
        $item ->icon = isset($input['icon']) ? $input['icon'] : '';
        $item ->desc = $input['desc'];
        $item ->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item ->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;

        $item->save();
        return redirect('admin/menuitems');
    }

    public function update(Request $request, $id)
    {
        ([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',

        ]);

        $input = $request->all();
        $item = new MenuItemsModel();
        $item ->name = $input['name'];
        $item ->type = isset($input['type']) ? $input['type'] : 0;
        $item ->params = isset($input['params']) ? $input['params'] : '';
        $item ->link = isset($input['link']) ? $input['link'] : '';
        $item ->icon = isset($input['icon']) ? $input['icon'] : '';
        $item ->desc = $input['desc'];
        $item ->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item ->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;

        $item->save();
        return redirect('admin/menuitems');

    }

    public function destroy($id)
    {
        $item = MenuItemsModel::find($id);
        $item->delete();

        return redirect('admin/menuitems');

    }
}
